<?php

namespace App\Controllers;

use App\Models\PurchaseModel;
use App\Models\PurchaseItemModel;
use App\Models\SupplierModel;
use App\Models\ProductModel;

class PurchaseController extends BaseController
{
    protected $purchaseModel;
    protected $purchaseItemModel;
    protected $supplierModel;
    protected $productModel;

    public function __construct()
    {
        $this->purchaseModel = new PurchaseModel();
        $this->purchaseItemModel = new PurchaseItemModel();
        $this->supplierModel = new SupplierModel();
        $this->productModel = new ProductModel();
    }

    /**
     * Display all purchases.
     */
    public function index()
    {
        $data['purchases'] = $this->purchaseModel->getPurchases();

        return view('purchases/index', $data);
    }

    /**
     * Show create purchase form.
     */
    public function create()
    {
        $data['suppliers'] = $this->supplierModel
            ->where('status', 'Active')
            ->orderBy('company_name')
            ->findAll();

        $data['products'] = $this->productModel
            ->orderBy('name')
            ->findAll();

        return view('purchases/create', $data);
    }

    /**
     * Save a new purchase.
     */
    public function store()
    {
        $db = db_connect();

        $db->transStart();

        try {

            $items = $this->request->getPost('items') ?? [];

            if (empty($items)) {

                throw new \Exception('No items provided for the purchase.');

            }


            // Calculate total
            $totalAmount = 0;

            foreach ($items as $item) {

                $totalAmount += $item['quantity'] * $item['cost_price'];

            }


            // Purchase data
            $purchaseData = [

                'purchase_number' => 'PUR-' . date('YmdHis'),

                'supplier_id' => $this->request->getPost('supplier_id'),

                'purchase_date' => $this->request->getPost('purchase_date'),

                'status' => $this->request->getPost('status'),

                'notes' => $this->request->getPost('notes'),

                'total_amount' => $totalAmount,

            ];


            // Insert purchase
            $purchaseId = $this->purchaseModel->insert($purchaseData);


            if (!$purchaseId) {

                throw new \Exception('Failed to create purchase.');

            }


            // Insert purchase items
            foreach ($items as $item) {


                $this->purchaseItemModel->insert([

                    'purchase_id' => $purchaseId,

                    'product_id' => $item['product_id'],

                    'quantity' => $item['quantity'],

                    'unit_cost' => $item['cost_price'],

                    'subtotal' => $item['quantity'] * $item['cost_price'],

                ]);


            }


            $db->transComplete();


            if ($db->transStatus() === false) {

                throw new \Exception('Purchase transaction failed.');

            }


            return redirect()

                ->to(site_url('purchases'))

                ->with('success', 'Purchase created successfully.');



        } catch (\Exception $e) {


            $db->transRollback();


            return redirect()

                ->back()

                ->withInput()

                ->with('error', $e->getMessage());

        }
    }

    /**
     * View purchase details.
     */
    public function show($id)
    {
        $data['purchase'] = $this->purchaseModel->getPurchase($id);
        $data['purchaseItems'] = $this->purchaseItemModel->getItemsByPurchase($id);

        return view('purchases/show', $data);
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $data['purchase'] = $this->purchaseModel->find($id);

        $data['purchaseItems'] = $this->purchaseItemModel
            ->where('purchase_id', $id)
            ->findAll();

        $data['suppliers'] = $this->supplierModel
            ->where('status', 'Active')
            ->orderBy('company_name')
            ->findAll();

        $data['products'] = $this->productModel
            ->orderBy('name')
            ->findAll();

        return view('purchases/edit', $data);
    }

    /**
     * Update purchase.
     */
    public function update($id)
    {
        //
    }

    /**
     * Delete purchase.
     */
    public function delete($id)
    {
        //
    }

    public function receive($id)
    {

        // dd([
        //     'purchase_id' => $id,
        //     'method' => $this->request->getMethod()
        // ]);
        $purchase = $this->purchaseModel->find($id);


        if (!$purchase) {

            return redirect()
                ->back()
                ->with('error', 'Purchase not found.');

        }


        if ($purchase['status'] !== 'Pending') {

            return redirect()
                ->back()
                ->with('error', 'Purchase already processed.');

        }


        $items = $this->purchaseItemModel
            ->where('purchase_id', $id)
            ->findAll();


        foreach ($items as $item) {


            $product = $this->productModel
                ->find($item['product_id']);


            $newStock = $product['stock'] + $item['quantity'];


            $this->productModel->update(
                $product['id'],
                [
                    'stock' => $newStock
                ]
            );


        }


        $this->purchaseModel->update(
            $id,
            [
                'status' => 'Received'
            ]
        );


        return redirect()
            ->to(site_url('purchases'))
            ->with('success','Purchase received and inventory updated.');

    }

    public function cancel($id)
    {
        $purchase = $this->purchaseModel->find($id);


        if (!$purchase) {

            return redirect()->back();

        }


        $this->purchaseModel->update(
            $id,
            [
                'status' => 'Cancelled'
            ]
        );


        return redirect()
            ->to(site_url('purchases'))
            ->with('success','Purchase cancelled.');

    }
}