<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\SaleItemModel;
use App\Models\ProductModel;

class InvoiceController extends BaseController
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

    /**
     * Sale History
     */
    public function index()
    {
        $sales = $this->saleModel
            ->orderBy('sale_date', 'DESC')
            ->findAll();

        return view('invoices/index', [
            'sales' => $sales,
        ]);
    }


    /**
     * View individual sale / receipt
     */
    public function show($invoice)
    {
        $sale = $this->saleModel->find($invoice);

        if (!$sale) {
            return redirect()
                ->to('/invoices')
                ->with('error', 'Sale receipt could not be found.');
        }

        $items = $this->saleItemModel
            ->select(
                'sale_items.*,
                 products.name AS product_name,
                 products.sku AS product_sku'
            )
            ->join(
                'products',
                'products.id = sale_items.product_id',
                'left'
            )
            ->where('sale_items.sale_id', $sale['id'])
            ->findAll();

        return view('invoices/receipt', [
            'sale'  => $sale,
            'items' => $items,
        ]);
    }


    /**
     * Receipt
     */
    public function receipt($invoice)
    {
        return $this->show($invoice);
    }
}