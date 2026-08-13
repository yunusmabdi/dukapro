<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        /*
        |--------------------------------------------------------------------------
        | TOTAL SALES
        |--------------------------------------------------------------------------
        */

        $totalSales = $db->table('sales')
            ->where('status', 'Completed')
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | TOTAL REVENUE
        |--------------------------------------------------------------------------
        */

        $revenueResult = $db->table('sales')
            ->selectSum('total')
            ->where('status', 'Completed')
            ->get()
            ->getRowArray();

        $totalRevenue = (float) ($revenueResult['total'] ?? 0);


        /*
        |--------------------------------------------------------------------------
        | LOW STOCK
        |--------------------------------------------------------------------------
        */

        $lowStock = $db->table('products')
            ->where('status', 'Active')
            ->where('stock <= min_stock', null, false)
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | PROFIT
        |--------------------------------------------------------------------------
        |
        | Profit =
        | Sale item total - product cost
        |
        */

        $profitResult = $db->table('sale_items si')
            ->select(
                'SUM(si.total - (si.quantity * p.cost_price)) AS profit',
                false
            )
            ->join('sales s', 's.id = si.sale_id')
            ->join('products p', 'p.id = si.product_id')
            ->where('s.status', 'Completed')
            ->get()
            ->getRowArray();

        $profit = (float) ($profitResult['profit'] ?? 0);


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

            $dayResult = $db->table('sales')
                ->selectSum('total')
                ->where('status', 'Completed')
                ->where(
                    'sale_date >=',
                    $date . ' 00:00:00'
                )
                ->where(
                    'sale_date <=',
                    $date . ' 23:59:59'
                )
                ->get()
                ->getRowArray();

            $salesOverview[] = [
                'date'  => $date,
                'label' => date('D', strtotime($date)),
                'total' => (float) ($dayResult['total'] ?? 0),
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | RECENT SALES
        |--------------------------------------------------------------------------
        */

        $recentSales = $db->table('sales')
            ->select(
                'id, invoice_number, sale_date, total, payment_method, status'
            )
            ->where('status', 'Completed')
            ->orderBy('sale_date', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('dashboard/index', [

            'totalSales'     => $totalSales,

            'totalRevenue'   => $totalRevenue,

            'lowStock'       => $lowStock,

            'profit'         => $profit,

            'salesOverview'  => $salesOverview,

            'recentSales'    => $recentSales,

        ]);
    }
}