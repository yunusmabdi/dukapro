<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    /**
     * Display all products
     */
    public function index()
    {
        $data['title'] = 'Products';
        $data['products'] = $this->productModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('products/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('products/create', [
            'title' => 'Add Product'
        ]);
    }

    /**
     * Save product
     */
    public function store()
    {
        $this->productModel->save([
            'sku'            => $this->request->getPost('sku'),
            'barcode'        => $this->request->getPost('barcode'),
            'name'           => $this->request->getPost('name'),
            'category'       => $this->request->getPost('category'),
            'brand'          => $this->request->getPost('brand'),
            'unit'           => $this->request->getPost('unit'),
            'cost_price'     => $this->request->getPost('cost_price'),
            'selling_price'  => $this->request->getPost('selling_price'),
            'stock'          => $this->request->getPost('stock'),
            'min_stock'      => $this->request->getPost('min_stock'),
            'status'         => $this->request->getPost('status'),
        ]);

        return redirect()->to('/products')
            ->with('success', 'Product added successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        return view('products/edit', [
            'title'   => 'Edit Product',
            'product' => $this->productModel->find($id)
        ]);
    }

    /**
     * Update product
     */
    public function update($id)
    {
        $this->productModel->update($id, [
            'sku'            => $this->request->getPost('sku'),
            'barcode'        => $this->request->getPost('barcode'),
            'name'           => $this->request->getPost('name'),
            'category'       => $this->request->getPost('category'),
            'brand'          => $this->request->getPost('brand'),
            'unit'           => $this->request->getPost('unit'),
            'cost_price'     => $this->request->getPost('cost_price'),
            'selling_price'  => $this->request->getPost('selling_price'),
            'stock'          => $this->request->getPost('stock'),
            'min_stock'      => $this->request->getPost('min_stock'),
            'status'         => $this->request->getPost('status'),
        ]);

        return redirect()->to('/products')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Delete product
     */
    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to('/products')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Product details
     */
    public function show($id)
    {
        return view('products/show', [
            'title'   => 'Product Details',
            'product' => $this->productModel->find($id)
        ]);
    }
    
}