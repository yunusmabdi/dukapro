<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class CartController extends BaseController
{
    protected ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');

        if (!$productId) {
            return redirect()->to('/pos');
        }

        $product = $this->productModel->find($productId);

        if (!$product) {
            return redirect()->to('/pos');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {

            $cart[$productId]['quantity']++;

        } else {

            $cart[$productId] = [
                'product_id' => $product['id'],
                'name'       => $product['name'],
                'price'      => (float) $product['selling_price'],
                'image'      => $product['image'],
                'quantity'   => 1,
            ];
        }

        session()->set('cart', $cart);

        return redirect()->to('/pos');
    }

    public function remove()
    {
        $productId = $this->request->getPost('product_id');

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {

            if ($cart[$productId]['quantity'] > 1) {

                $cart[$productId]['quantity']--;

            } else {

                unset($cart[$productId]);

            }

            session()->set('cart', $cart);
        }

        return redirect()->to('/pos');
    }

    public function update()
    {
        $productId = $this->request->getPost('product_id');
        $quantity  = (int)$this->request->getPost('quantity');

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {

            if ($quantity <= 0) {

                unset($cart[$productId]);

            } else {

                $cart[$productId]['quantity'] = $quantity;

            }

            session()->set('cart', $cart);
        }

        return redirect()->to('/pos');
    }

    public function clear()
    {
        session()->remove('cart');

        return redirect()->to('/pos');
    }
}