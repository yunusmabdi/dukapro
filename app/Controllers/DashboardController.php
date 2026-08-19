<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        $totalProducts = $productModel
            ->where('status', 'active')
            ->countAllResults();

        $lowStockProducts = $productModel
            ->where('status', 'active')
            ->where('stock <= min_stock', null, false)
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | TODAY'S SALES
        |--------------------------------------------------------------------------
        */

        $todaySalesRow = $saleModel
            ->selectSum('total')
            ->where('sale_date >=', $today . ' 00:00:00')
            ->where('sale_date <=', $today . ' 23:59:59')
            ->where('status', 'completed')
            ->first();

        $todaySales = (float) ($todaySalesRow['total'] ?? 0);


        /*
        |--------------------------------------------------------------------------
        | YESTERDAY'S SALES
        |--------------------------------------------------------------------------
        */

        $yesterdaySalesRow = $saleModel
            ->selectSum('total')
            ->where('sale_date >=', $yesterday . ' 00:00:00')
            ->where('sale_date <=', $yesterday . ' 23:59:59')
            ->where('status', 'completed')
            ->first();

        $yesterdaySales = (float) ($yesterdaySalesRow['total'] ?? 0);


        /*
        |--------------------------------------------------------------------------
        | SALES PERCENTAGE CHANGE
        |--------------------------------------------------------------------------
        */

        if ($yesterdaySales > 0) {
            $salesChange = (($todaySales - $yesterdaySales) / $yesterdaySales) * 100;
        } elseif ($todaySales > 0) {
            $salesChange = 100;
        } else {
            $salesChange = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | TODAY'S ORDERS
        |--------------------------------------------------------------------------
        */

        $ordersToday = $saleModel
            ->where('sale_date >=', $today . ' 00:00:00')
            ->where('sale_date <=', $today . ' 23:59:59')
            ->where('status', 'completed')
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | YESTERDAY'S ORDERS
        |--------------------------------------------------------------------------
        */

        $ordersYesterday = $saleModel
            ->where('sale_date >=', $yesterday . ' 00:00:00')
            ->where('sale_date <=', $yesterday . ' 23:59:59')
            ->where('status', 'completed')
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | ORDERS PERCENTAGE CHANGE
        |--------------------------------------------------------------------------
        */

        if ($ordersYesterday > 0) {
            $ordersChange =
                (($ordersToday - $ordersYesterday) / $ordersYesterday) * 100;
        } elseif ($ordersToday > 0) {
            $ordersChange = 100;
        } else {
            $ordersChange = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | LAST 7 DAYS SALES
        |--------------------------------------------------------------------------
        */

        $salesOverview = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = date(
                'Y-m-d',
                strtotime("-{$i} days")
            );

            $row = $saleModel
                ->selectSum('total')
                ->where('sale_date >=', $date . ' 00:00:00')
                ->where('sale_date <=', $date . ' 23:59:59')
                ->where('status', 'completed')
                ->first();

            $salesOverview[] = [
                'date' => $date,
                'label' => date('D', strtotime($date)),
                'total' => (float) ($row['total'] ?? 0),
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD DATA
        |--------------------------------------------------------------------------
        */

        $data = [

            'totalProducts' => $totalProducts,

            'lowStockProducts' => $lowStockProducts,

            'todaySales' => $todaySales,

            'yesterdaySales' => $yesterdaySales,

            'salesChange' => round($salesChange, 1),

            'ordersToday' => $ordersToday,

            'ordersYesterday' => $ordersYesterday,

            'ordersChange' => round($ordersChange, 1),

            'salesOverview' => $salesOverview,

        ];


        return view('dashboard/index', $data);
    }
}