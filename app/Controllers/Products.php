<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SupplierModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    protected $supplierModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->supplierModel = new SupplierModel();
    }

    /**
     * Display all products
     */
    public function index()
    {
        $data = [
        'title' => 'Products',

        'products' => $this->productModel
            ->select('
                products.*,
                categories.name AS category_name,
                suppliers.company_name AS supplier_name
            ')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->join('suppliers', 'suppliers.id = products.supplier_id', 'left')
            ->orderBy('products.id', 'DESC')
            ->findAll(),
        ];

        return view('products/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data = [

            'title' => 'Add Product',

            'categories' => $this->categoryModel
                ->where('status', 'Active')
                ->orderBy('name')
                ->findAll(),

            'suppliers' => $this->supplierModel
                ->findall(),
        ];
        return view('products/create', $data);
    }

    /**
     * Save product
     */
    public function store()
    {   
        $this->productModel->save([
            
            'sku'            => $this->productModel->generateSku(),
            'barcode'        => $this->productModel->generateBarcode(),
            'name'           => $this->request->getPost('name'),
            'category_id'    => $this->request->getPost('category_id'),
            'supplier_id'    => $this->request->getPost('supplier_id'),
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
        $data = [

            'title' => 'Edit Product',

            'product' => $this->productModel->find($id),

            'categories' => $this->categoryModel
                ->where('status', 'Active')
                ->orderBy('name')
                ->findAll(),

        ];
        return view('products/edit', $data);
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
            'category_id'    => $this->request->getPost('category_id'),
            'supplier_id'    => $this->request->getPost('supplier_id'),
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
        $product = $this->productModel
            ->select('products.*, categories.name as category_name, suppliers.company_name as supplier_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->join('suppliers', 'suppliers.id = products.supplier_id', 'left')
            ->where('products.id', $id)
            ->first();

        return view('products/show', [
            'title'   => 'Product Details',
            'product' => $product,
        ]);
    }
    
}