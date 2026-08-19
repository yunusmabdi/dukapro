<?php
$segment = service('uri')->getSegment(1);

/*
|--------------------------------------------------------------------------
| Dashboard values supplied by DashboardController
|--------------------------------------------------------------------------
*/

$todaySales = $todaySales ?? 0;
$ordersToday = $ordersToday ?? 0;
$totalProducts = $totalProducts ?? 0;
$lowStockProducts = $lowStockProducts ?? 0;

$salesChange = $salesChange ?? 0;
$ordersChange = $ordersChange ?? 0;

$salesOverview = $salesOverview ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>DukaPro Dashboard</title>


    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- Sidebar CSS -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/sidebar.css') ?>"
    >


    <style>

        /* =========================================
           GLOBAL
        ========================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Helvetica, Arial, sans-serif;

            background: #f5f7fb;

            color: #172033;

            min-height: 100vh;
        }


        a {
            text-decoration: none;

            color: inherit;
        }


        /* =========================================
           MAIN CONTENT
        ========================================== */

        .main {

            margin-left: 270px;

            min-height: 100vh;

            padding: 28px 34px;

            transition: margin-left .3s ease;
        }


        .main.expanded {

            margin-left: 0;
        }


        /* =========================================
           TOP BAR
        ========================================== */

        .topbar {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 28px;
        }


        .toggle-sidebar {

            width: 42px;

            height: 42px;

            border: none;

            border-radius: 12px;

            background: #fff;

            color: #334155;

            box-shadow:
                0 4px 15px rgba(15, 23, 42, .08);

            cursor: pointer;

            font-size: 19px;

            transition: all .2s ease;
        }


        .toggle-sidebar:hover {

            background: #2563eb;

            color: #fff;
        }


        .date-box {

            display: flex;

            align-items: center;

            gap: 8px;

            background: #fff;

            border: 1px solid #e2e8f0;

            padding: 10px 14px;

            border-radius: 12px;

            color: #475569;

            font-size: 13px;
        }


        /* =========================================
           PAGE TITLE
        ========================================== */

        .page-title {

            margin-bottom: 25px;
        }


        .page-title h1 {

            font-size: 30px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        .page-title p {

            color: #64748b;

            font-size: 14px;
        }


        /* =========================================
           STATISTICS
        ========================================== */

        .stats-grid {

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 22px;
        }


        .stat-card {

            background: #fff;

            border: 1px solid #e8edf4;

            border-radius: 18px;

            padding: 20px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, .04);
        }


        .stat-top {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 18px;
        }


        .stat-icon {

            width: 42px;

            height: 42px;

            border-radius: 12px;

            background: #eff6ff;

            color: #2563eb;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;
        }


        .stat-label {

            color: #64748b;

            font-size: 13px;
        }


        .stat-value {

            font-size: 27px;

            font-weight: 700;

            margin-bottom: 8px;

            color: #172033;
        }


        .stat-change {

            font-size: 12px;

            color: #16a34a;
        }


        .stat-change.warning {

            color: #dc2626;
        }


        .stat-change.neutral {

            color: #64748b;
        }


        /* =========================================
           LOWER DASHBOARD
        ========================================== */

        .dashboard-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 2fr)
                minmax(300px, 1fr);

            gap: 20px;
        }


        .card {

            background: #fff;

            border: 1px solid #e8edf4;

            border-radius: 18px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, .04);

            overflow: hidden;
        }


        .card-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px;

            border-bottom: 1px solid #eef2f7;
        }


        .card-header h3 {

            font-size: 16px;

            font-weight: 600;
        }


        .card-header span {

            color: #64748b;

            font-size: 12px;
        }


        .card-body {

            padding: 20px;
        }


        /* =========================================
           SALES CHART
        ========================================== */

        .sales-chart {

            height: 280px;

            display: flex;

            align-items: flex-end;

            justify-content: space-around;

            gap: 15px;

            padding: 20px;

            background:
                repeating-linear-gradient(
                    to bottom,
                    transparent,
                    transparent 55px,
                    #f1f5f9 56px
                );

            border-radius: 12px;
        }


        .chart-column {

            height: 100%;

            flex: 1;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: flex-end;

            gap: 7px;

            min-width: 0;
        }


        .chart-value {

            font-size: 10px;

            color: #64748b;

            white-space: nowrap;
        }


        .chart-bar-wrapper {

            height: 200px;

            width: 100%;

            display: flex;

            align-items: flex-end;

            justify-content: center;
        }


        .chart-bar {

            width: 100%;

            max-width: 48px;

            min-height: 4px;

            background: #2563eb;

            border-radius: 8px 8px 3px 3px;

            transition:
                height .3s ease,
                opacity .2s ease;
        }


        .chart-bar:hover {

            opacity: .8;
        }


        .chart-label {

            font-size: 11px;

            color: #64748b;

            font-weight: 500;
        }


        .empty-chart {

            width: 100%;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #94a3b8;

            font-size: 13px;
        }


        /* =========================================
           QUICK ACTIONS
        ========================================== */

        .quick-actions {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;
        }


        .quick-action {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 13px;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            color: #334155;

            font-size: 13px;

            transition: .2s;
        }


        .quick-action i {

            font-size: 17px;

            color: #2563eb;
        }


        .quick-action:hover {

            border-color: #2563eb;

            color: #2563eb;

            background: #eff6ff;
        }


        /* =========================================
           RESPONSIVE
        ========================================== */

        @media (max-width: 1100px) {

            .stats-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .dashboard-grid {

                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 768px) {

            .main,
            .main.expanded {

                margin-left: 0;

                padding: 20px;
            }


            .stats-grid {

                grid-template-columns: 1fr;
            }


            .topbar {

                margin-bottom: 20px;
            }


            .page-title h1 {

                font-size: 25px;
            }
        }


        @media (max-width: 500px) {

            .quick-actions {

                grid-template-columns: 1fr;
            }


            .date-box {

                font-size: 12px;

                padding: 9px 11px;
            }


            .stat-value {

                font-size: 24px;
            }
        }

    </style>

</head>


<body>


    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <?= view('partials/sidebar') ?>


    <!-- =========================================
         MAIN CONTENT
    ========================================== -->

    <main
        class="main"
        id="main"
    >


        <!-- =====================================
             TOP BAR
        ====================================== -->

        <div class="topbar">


            <button
                class="toggle-sidebar"
                id="toggleSidebar"
                title="Toggle sidebar"
                type="button"
            >

                <i class="bi bi-list"></i>

            </button>


            <div class="date-box">

                <i class="bi bi-calendar3"></i>

                <?= date('M d, Y') ?>

            </div>


        </div>



        <!-- =====================================
             PAGE TITLE
        ====================================== -->

        <div class="page-title">

            <h1>
                Dashboard
            </h1>


            <p>

                Welcome back,
                <?= esc(session('user_name') ?? 'Administrator') ?>.

                Here's what's happening with your
                business today.

            </p>

        </div>



        <!-- =====================================
             STATISTICS
        ====================================== -->

        <div class="stats-grid">


            <!-- =================================
                 TODAY'S SALES
            ================================== -->

            <div class="stat-card">


                <div class="stat-top">

                    <div class="stat-label">
                        Today's Sales
                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-currency-exchange"></i>

                    </div>

                </div>


                <div class="stat-value">

                    KES
                    <?= number_format($todaySales, 2) ?>

                </div>


                <div
                    class="stat-change
                    <?= $salesChange < 0 ? 'warning' : '' ?>
                    <?= $salesChange == 0 ? 'neutral' : '' ?>"
                >

                    <?php if ($salesChange > 0): ?>

                        <i class="bi bi-arrow-up"></i>

                        <?= number_format(abs($salesChange), 1) ?>%
                        vs yesterday

                    <?php elseif ($salesChange < 0): ?>

                        <i class="bi bi-arrow-down"></i>

                        <?= number_format(abs($salesChange), 1) ?>%
                        vs yesterday

                    <?php else: ?>

                        No change vs yesterday

                    <?php endif; ?>

                </div>

            </div>



            <!-- =================================
                 ORDERS TODAY
            ================================== -->

            <div class="stat-card">


                <div class="stat-top">

                    <div class="stat-label">
                        Orders Today
                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-cart-check"></i>

                    </div>

                </div>


                <div class="stat-value">

                    <?= number_format($ordersToday) ?>

                </div>


                <div
                    class="stat-change
                    <?= $ordersChange < 0 ? 'warning' : '' ?>
                    <?= $ordersChange == 0 ? 'neutral' : '' ?>"
                >

                    <?php if ($ordersChange > 0): ?>

                        <i class="bi bi-arrow-up"></i>

                        <?= number_format(abs($ordersChange), 1) ?>%
                        vs yesterday

                    <?php elseif ($ordersChange < 0): ?>

                        <i class="bi bi-arrow-down"></i>

                        <?= number_format(abs($ordersChange), 1) ?>%
                        vs yesterday

                    <?php else: ?>

                        No change vs yesterday

                    <?php endif; ?>

                </div>

            </div>



            <!-- =================================
                 TOTAL PRODUCTS
            ================================== -->

            <div class="stat-card">


                <div class="stat-top">

                    <div class="stat-label">
                        Total Products
                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-box"></i>

                    </div>

                </div>


                <div class="stat-value">

                    <?= number_format($totalProducts) ?>

                </div>


                <div class="stat-change neutral">

                    All active products

                </div>

            </div>



            <!-- =================================
                 LOW STOCK
            ================================== -->

            <div class="stat-card">


                <div class="stat-top">

                    <div class="stat-label">
                        Low Stock
                    </div>


                    <div class="stat-icon">

                        <i class="bi bi-exclamation-triangle"></i>

                    </div>

                </div>


                <div class="stat-value">

                    <?= number_format($lowStockProducts) ?>

                </div>


                <div
                    class="stat-change
                    <?= $lowStockProducts > 0
                        ? 'warning'
                        : 'neutral'
                    ?>"
                >

                    <?php if ($lowStockProducts > 0): ?>

                        Requires attention

                    <?php else: ?>

                        Stock levels healthy

                    <?php endif; ?>

                </div>

            </div>


        </div>



        <!-- =====================================
             LOWER DASHBOARD
        ====================================== -->

        <div class="dashboard-grid">


            <!-- =================================
                 SALES OVERVIEW
            ================================== -->

            <div class="card">


                <div class="card-header">

                    <h3>
                        Sales Overview
                    </h3>


                    <span>
                        Last 7 days
                    </span>

                </div>


                <div class="card-body">


                    <?php if (!empty($salesOverview)): ?>


                        <?php

                        $salesTotals = array_column(
                            $salesOverview,
                            'total'
                        );

                        $maxSale = !empty($salesTotals)
                            ? max($salesTotals)
                            : 0;

                        $maxSale = $maxSale > 0
                            ? $maxSale
                            : 1;

                        ?>


                        <div class="sales-chart">


                            <?php foreach ($salesOverview as $day): ?>


                                <?php

                                $percentage =
                                    ($day['total'] / $maxSale) * 100;

                                $height =
                                    max(3, ($percentage / 100) * 200);

                                ?>


                                <div class="chart-column">


                                    <div class="chart-value">

                                        KES
                                        <?= number_format(
                                            $day['total']
                                        ) ?>

                                    </div>


                                    <div class="chart-bar-wrapper">

                                        <div
                                            class="chart-bar"
                                            style="
                                                height:
                                                <?= $height ?>px;
                                            "
                                            title="
                                                <?= esc($day['label']) ?>:
                                                KES
                                                <?= number_format(
                                                    $day['total'],
                                                    2
                                                ) ?>
                                            "
                                        ></div>

                                    </div>


                                    <div class="chart-label">

                                        <?= esc($day['label']) ?>

                                    </div>


                                </div>


                            <?php endforeach; ?>


                        </div>


                    <?php else: ?>


                        <div class="sales-chart">

                            <div class="empty-chart">

                                <i
                                    class="bi bi-bar-chart"
                                    style="
                                        margin-right: 8px;
                                    "
                                ></i>

                                No sales data available yet.

                            </div>

                        </div>


                    <?php endif; ?>


                </div>

            </div>



            <!-- =================================
                 QUICK ACTIONS
            ================================== -->

            <div class="card">


                <div class="card-header">

                    <h3>
                        Quick Actions
                    </h3>

                </div>


                <div class="card-body">


                    <div class="quick-actions">


                        <!-- ADD PRODUCT -->

                        <a
                            href="<?= base_url('products/create') ?>"
                            class="quick-action"
                        >

                            <i class="bi bi-plus-circle"></i>

                            Add Product

                        </a>


                        <!-- NEW PURCHASE -->

                        <a
                            href="<?= base_url('purchases/create') ?>"
                            class="quick-action"
                        >

                            <i class="bi bi-cart-plus"></i>

                            New Purchase

                        </a>


                        <!-- POS -->

                        <a
                            href="<?= base_url('pos') ?>"
                            class="quick-action"
                        >

                            <i class="bi bi-shop"></i>

                            Open POS

                        </a>


                        <!-- CUSTOMERS -->

                        <a
                            href="<?= base_url('customers') ?>"
                            class="quick-action"
                        >

                            <i class="bi bi-person-plus"></i>

                            Customers

                        </a>


                    </div>

                </div>

            </div>


        </div>


    </main>



    <!-- =========================================
         SIDEBAR TOGGLE
    ========================================== -->

    <script>

        const sidebar =
            document.getElementById('sidebar');

        const main =
            document.getElementById('main');

        const toggle =
            document.getElementById('toggleSidebar');


        if (toggle && sidebar && main) {

            toggle.addEventListener(
                'click',
                function () {

                    sidebar.classList.toggle('hidden');

                    main.classList.toggle('expanded');

                }
            );

        }

    </script>


</body>

</html>