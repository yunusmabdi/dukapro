<?php

namespace App\Controllers;

use App\Models\SaleModel;

class SalesHistoryController extends BaseController
{
    public function index()
    {
        $saleModel = new SaleModel();

        $sales = $saleModel
            ->select('sales.*, users.name AS cashier_name')
            ->join('users', 'users.id = sales.user_id', 'left')
            ->orderBy('sales.id', 'DESC')
            ->findAll();

        return view('sales/index', [
            'sales' => $sales
        ]);
    }
}