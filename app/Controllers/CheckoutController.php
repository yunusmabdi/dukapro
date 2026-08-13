<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\SaleItemModel;
use Throwable;

class CheckoutController extends BaseController
{
    protected SaleModel $saleModel;
    protected SaleItemModel $saleItemModel;
    protected ProductModel $productModel;

    public function __construct()
    {
        $this->saleModel     = new SaleModel();
        $this->saleItemModel = new SaleItemModel();
        $this->productModel  = new ProductModel();
    }

    public function checkout()
    {
        // Only POST should complete a sale.
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to('/pos');
        }

        // User must be logged in.
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()
                ->to('/login')
                ->with('error', 'Your session has expired. Please log in again.');
        }

        // Get cart.
        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()
                ->to('/pos')
                ->with('error', 'Your cart is empty.');
        }

        // Payment information.
        $paymentMethod = trim((string) $this->request->getPost('payment_method'));
        $amountPaid    = (float) $this->request->getPost('amount_paid');
        $paymentRef    = trim((string) $this->request->getPost('payment_reference'));

        // Validate payment method.
        $allowedMethods = ['Cash', 'M-Pesa', 'Card'];

        if (!in_array($paymentMethod, $allowedMethods, true)) {
            return redirect()
                ->to('/pos')
                ->with('error', 'Invalid payment method.');
        }

        // Payment amount must be positive.
        if ($amountPaid <= 0) {
            return redirect()
                ->to('/pos')
                ->with('error', 'Please enter a valid payment amount.');
        }

        // M-Pesa and Card require a reference.
        if (
            ($paymentMethod === 'M-Pesa' || $paymentMethod === 'Card')
            && $paymentRef === ''
        ) {
            return redirect()
                ->to('/pos')
                ->with(
                    'error',
                    'Transaction/reference number is required for ' . $paymentMethod . '.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Recalculate sale totals on the server
        |--------------------------------------------------------------------------
        */

        $subtotal = 0.00;
        $discount = 0.00;
        $tax      = 0.00;

        $saleItems = [];

        foreach ($cart as $cartItem) {

            if (
                !isset(
                    $cartItem['product_id'],
                    $cartItem['quantity'],
                    $cartItem['price']
                )
            ) {
                return redirect()
                    ->to('/pos')
                    ->with('error', 'Invalid cart item detected.');
            }

            $productId = (int) $cartItem['product_id'];
            $quantity  = (float) $cartItem['quantity'];

            if ($productId <= 0 || $quantity <= 0) {
                return redirect()
                    ->to('/pos')
                    ->with('error', 'Invalid product quantity detected.');
            }

            /*
            |--------------------------------------------------------------------------
            | Fetch the actual product from the database
            |--------------------------------------------------------------------------
            */

            $product = $this->productModel->find($productId);

            if (!$product) {
                return redirect()
                    ->to('/pos')
                    ->with(
                        'error',
                        'A product in the cart no longer exists.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Verify stock before starting the transaction
            |--------------------------------------------------------------------------
            */

            if ((float) $product['stock'] < $quantity) {
                return redirect()
                    ->to('/pos')
                    ->with(
                        'error',
                        'Insufficient stock for ' . $product['name'] . '. Available stock: ' . $product['stock']
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Use the current selling price from the database
            |--------------------------------------------------------------------------
            */

            $unitPrice = (float) $product['selling_price'];

            $lineSubtotal = $unitPrice * $quantity;

            // Current checkout has no per-item discount.
            $lineDiscount = 0.00;

            // Tax is 16%.
            $lineTax = $lineSubtotal * 0.16;

            $lineTotal = $lineSubtotal - $lineDiscount + $lineTax;

            $subtotal += $lineSubtotal;
            $discount += $lineDiscount;
            $tax      += $lineTax;

            $saleItems[] = [
                'product_id' => $productId,
                'quantity'   => $quantity,
                'unit_price' => $unitPrice,
                'discount'   => $lineDiscount,
                'tax'        => $lineTax,
                'total'      => $lineTotal,
            ];
        }

        $total = $subtotal - $discount + $tax;

        /*
        |--------------------------------------------------------------------------
        | Payment validation against calculated server-side total
        |--------------------------------------------------------------------------
        */

        if ($paymentMethod === 'Cash') {

            if ($amountPaid < $total) {
                return redirect()
                    ->to('/pos')
                    ->with(
                        'error',
                        'Amount received cannot be less than the sale total.'
                    );
            }

            $changeAmount = $amountPaid - $total;

        } else {

            // M-Pesa/Card must cover the exact sale amount.
            if (abs($amountPaid - $total) > 0.01) {
                return redirect()
                    ->to('/pos')
                    ->with(
                        'error',
                        $paymentMethod . ' payment must equal the sale total of KES ' .
                        number_format($total, 2)
                    );
            }

            $changeAmount = 0.00;
        }

        /*
        |--------------------------------------------------------------------------
        | Generate invoice number
        |--------------------------------------------------------------------------
        */

        $invoiceNumber =
            'INV-' .
            date('YmdHis') .
            '-' .
            strtoupper(bin2hex(random_bytes(2)));

        /*
        |--------------------------------------------------------------------------
        | Database transaction
        |--------------------------------------------------------------------------
        */

        $db = db_connect();

        $db->transBegin();

        try {

            /*
            |--------------------------------------------------------------------------
            | Create sale
            |--------------------------------------------------------------------------
            */

            $saleData = [
                'invoice_number' => $invoiceNumber,
                'customer_id'    => null,
                'user_id'        => $userId,
                'sale_date'      => date('Y-m-d H:i:s'),
                'subtotal'       => round($subtotal, 2),
                'discount'       => round($discount, 2),
                'tax'            => round($tax, 2),
                'total'          => round($total, 2),
                'payment_method' => $paymentMethod,
                'payment_reference' => $paymentRef !== '' ? $paymentRef : null,
                'amount_paid'    => round($amountPaid, 2),
                'change_amount'  => round($changeAmount, 2),
                'notes'          => null,
                'status'         => 'Completed',
            ];

            $saleId = $this->saleModel->insert($saleData);

            if (!$saleId) {
                throw new \RuntimeException(
                    'Unable to create the sale record.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Create sale items and deduct stock
            |--------------------------------------------------------------------------
            */

            foreach ($saleItems as $item) {

                $saleItemData = [
                    'sale_id'    => $saleId,
                    'product_id' => $item['product_id'],
                    'quantity'   => $item['quantity'],
                    'unit_price' => round($item['unit_price'], 2),
                    'discount'   => round($item['discount'], 2),
                    'tax'        => round($item['tax'], 2),
                    'total'      => round($item['total'], 2),
                ];

                $saleItemId = $this->saleItemModel->insert($saleItemData);

                if (!$saleItemId) {
                    throw new \RuntimeException(
                        'Unable to create a sale item.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Lock the product row and verify stock again
                |--------------------------------------------------------------------------
                */

                $product = $db
                    ->query(
                        'SELECT id, name, stock
                         FROM products
                         WHERE id = ?
                         FOR UPDATE',
                        [$item['product_id']]
                    )
                    ->getRowArray();

                if (!$product) {
                    throw new \RuntimeException(
                        'Product no longer exists.'
                    );
                }

                if ((float) $product['stock'] < (float) $item['quantity']) {
                    throw new \RuntimeException(
                        'Insufficient stock for ' . $product['name'] . '.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Deduct stock
                |--------------------------------------------------------------------------
                */

                $newStock =
                    (float) $product['stock'] -
                    (float) $item['quantity'];

                $updated = $this->productModel
                    ->where('id', $item['product_id'])
                    ->set('stock', $newStock)
                    ->update();

                if (!$updated) {
                    throw new \RuntimeException(
                        'Unable to update stock for ' . $product['name'] . '.'
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Commit transaction
            |--------------------------------------------------------------------------
            */

            if ($db->transStatus() === false) {
                throw new \RuntimeException(
                    'The checkout transaction failed.'
                );
            }

            $db->transCommit();

        } catch (Throwable $e) {

            $db->transRollback();

            log_message(
                'error',
                'Checkout failed: ' . $e->getMessage()
            );

            return redirect()
                ->to('/pos')
                ->with(
                    'error',
                    'The sale could not be completed. No changes were made.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Clear cart ONLY after successful transaction
        |--------------------------------------------------------------------------
        */

        session()->remove('cart');

        /*
        |--------------------------------------------------------------------------
        | Redirect to receipt
        |--------------------------------------------------------------------------
        */

        return redirect()->to('/invoices/' . $saleId);
    }

    public function draft()
    {
        return redirect()
            ->to('/pos')
            ->with('error', 'Draft sales are not implemented yet.');
    }

    public function resume($id)
    {
        return redirect()
            ->to('/pos')
            ->with('error', 'Draft sales are not implemented yet.');
    }
}