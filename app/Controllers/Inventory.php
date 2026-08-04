<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Inventory extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Inventory',
            'products' => $this->productModel
                ->select('
                    products.*,
                    categories.name AS category_name,
                    suppliers.company_name AS supplier_name
                ')
                ->join('categories', 'categories.id = products.category_id', 'left')
                ->join('suppliers', 'suppliers.id = products.supplier_id', 'left')
                ->orderBy('products.name', 'ASC')
                ->findAll(),
        ];

        return view('inventory/index', $data);
    }
}