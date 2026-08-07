<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class PosController extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $categories = $categoryModel
            ->orderBy('name', 'ASC')
            ->findAll();

        $products = $productModel
            ->select('products.*, categories.name AS category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->orderBy('products.name', 'ASC')
            ->findAll();

        return view('pos/index', [
            'categories' => $categories,
            'products'   => $products,
        ]);
    }
    public function cartCount()
    {
        $cart = session()->get('cart') ?? [];

        return $this->response->setJSON([
            'count' => count($cart)
        ]);
    }
}