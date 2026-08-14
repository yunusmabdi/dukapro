<?php

$segment = service('uri')->getSegment(1);

$totalSales    = $totalSales ?? 0;
$totalRevenue  = $totalRevenue ?? 0;
$lowStock      = $lowStock ?? 0;
$profit        = $profit ?? 0;
$salesOverview = $salesOverview ?? [];
$recentSales   = $recentSales ?? [];

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


    <!-- Sidebar -->

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/sidebar.css') ?>"
    >


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background: #f5f7fb;

            color: #172033;

            min-height: 100vh;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        /* =========================================
           MAIN
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

            justify-content: space-between;

            align-items: center;

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
           KPI GRID
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


        .stat-label {

            color: #64748b;

            font-size: 13px;
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


        .stat-value {

            font-size: 27px;

            font-weight: 700;

            margin-bottom: 8px;
        }


        .stat-description {

            font-size: 12px;

            color: #64748b;
        }


        .stat-description.warning {

            color: #dc2626;
        }


        /* =========================================
           LOWER GRID
        ========================================== */

        .dashboard-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 2fr)
                minmax(300px, 1fr);

            gap: 20px;
        }


        /* =========================================
           CARD
        ========================================== */

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

            margin: 0;
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

        .chart {

            height: 280px;

            display: flex;

            align-items: flex-end;

            gap: 15px;

            padding: 20px 10px 10px;

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

            flex: 1;

            height: 100%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: flex-end;
        }


        .chart-bar {

            width: 38px;

            background: #2563eb;

            border-radius: 7px 7px 3px 3px;

            min-height: 3px;

            max-width: 100%;
        }


        .chart-value {

            font-size: 10px;

            color: #64748b;

            margin-bottom: 5px;

            white-space: nowrap;
        }


        .chart-label {

            font-size: 11px;

            color: #64748b;

            margin-top: 8px;
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


        .quick-action:hover {

            border-color: #2563eb;

            color: #2563eb;

            background: #eff6ff;
        }


        /* =========================================
           RECENT SALES
        ========================================== */

        .recent-sales {

            margin-top: 20px;
        }


        .sales-table {

            width: 100%;

            border-collapse: collapse;
        }


        .sales-table th {

            text-align: left;

            color: #64748b;

            font-size: 12px;

            font-weight: 600;

            padding: 12px;

            border-bottom: 1px solid #eef2f7;
        }


        .sales-table td {

            padding: 13px 12px;

            font-size: 13px;

            border-bottom: 1px solid #f1f5f9;
        }


        .sales-table tr:last-child td {

            border-bottom: none;
        }


        .payment-badge {

            display: inline-block;

            padding: 4px 8px;

            border-radius: 8px;

            background: #eff6ff;

            color: #2563eb;

            font-size: 11px;
        }


        .status-completed {

            color: #16a34a;

            font-size: 12px;

            font-weight: 600;
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

            .main {

                margin-left: 0;

                padding: 20px;
            }


            .stats-grid {

                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<?= view('partials/sidebar') ?>


<main
    class="main"
    id="main"
>


    <!-- =========================================
         TOP BAR
    ========================================== -->

    <div class="topbar">

        <button
            class="toggle-sidebar"
            id="toggleSidebar"
            type="button"
        >

            <i class="bi bi-list"></i>

        </button>


        <div class="date-box">

            <i class="bi bi-calendar3"></i>

            <?= date('M d, Y') ?>

        </div>

    </div>


    <!-- =========================================
         TITLE
    ========================================== -->

    <div class="page-title">

        <h1>
            Dashboard
        </h1>

        <p>

            Welcome back,
            <?= esc(session('user_name') ?? 'Administrator') ?>.

            Here's what's happening with your business.

        </p>

    </div>


    <!-- =========================================
         REAL KPIs
    ========================================== -->

    <div class="stats-grid">


        <!-- TOTAL SALES -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-label">
                    Total Sales
                </div>

                <div class="stat-icon">

                    <i class="bi bi-receipt"></i>

                </div>

            </div>


            <div class="stat-value">

                <?= number_format($totalSales) ?>

            </div>


            <div class="stat-description">

                Completed sales

            </div>

        </div>


        <!-- TOTAL REVENUE -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-label">
                    Total Revenue
                </div>

                <div class="stat-icon">

                    <i class="bi bi-currency-exchange"></i>

                </div>

            </div>


            <div class="stat-value">

                KES
                <?= number_format($totalRevenue, 2) ?>

            </div>


            <div class="stat-description">

                From completed sales

            </div>

        </div>


        <!-- LOW STOCK -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-label">
                    Low Stock Alerts
                </div>

                <div class="stat-icon">

                    <i class="bi bi-exclamation-triangle"></i>

                </div>

            </div>


            <div class="stat-value">

                <?= number_format($lowStock) ?>

            </div>


            <div
                class="stat-description
                <?= $lowStock > 0 ? 'warning' : '' ?>"
            >

                <?php if ($lowStock > 0): ?>

                    Products require attention

                <?php else: ?>

                    Inventory levels are healthy

                <?php endif; ?>

            </div>

        </div>


        <!-- PROFIT -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-label">
                    Profit
                </div>

                <div class="stat-icon">

                    <i class="bi bi-graph-up-arrow"></i>

                </div>

            </div>


            <div class="stat-value">

                KES
                <?= number_format($profit, 2) ?>

            </div>


            <div class="stat-description">

                Revenue minus product cost

            </div>

        </div>


    </div>


    <!-- =========================================
         LOWER DASHBOARD
    ========================================== -->

    <div class="dashboard-grid">


        <!-- =====================================
             SALES OVERVIEW
        ====================================== -->

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

                <div class="chart">


                    <?php

                    $maxSales = 0;

                    foreach ($salesOverview as $day) {

                        if ($day['total'] > $maxSales) {

                            $maxSales = $day['total'];

                        }

                    }

                    if ($maxSales <= 0) {

                        $maxSales = 1;

                    }

                    ?>


                    <?php foreach ($salesOverview as $day): ?>

                        <?php

                        $barHeight =
                            ($day['total'] / $maxSales) * 190;

                        if ($barHeight < 3) {

                            $barHeight = 3;

                        }

                        ?>


                        <div class="chart-column">


                            <div class="chart-value">

                                KES
                                <?= number_format(
                                    $day['total'],
                                    0
                                ) ?>

                            </div>


                            <div
                                class="chart-bar"
                                style="
                                    height:
                                    <?= $barHeight ?>px;
                                "
                            ></div>


                            <div class="chart-label">

                                <?= esc($day['label']) ?>

                            </div>


                        </div>

                    <?php endforeach; ?>


                </div>

            </div>

        </div>


        <!-- =====================================
             QUICK ACTIONS
        ====================================== -->

        <div class="card">

            <div class="card-header">

                <h3>
                    Quick Actions
                </h3>

            </div>


            <div class="card-body">

                <div class="quick-actions">


                    <a
                        href="<?= base_url('products/create') ?>"
                        class="quick-action"
                    >

                        <i class="bi bi-plus-circle"></i>

                        Add Product

                    </a>


                    <a
                        href="<?= base_url('purchases/create') ?>"
                        class="quick-action"
                    >

                        <i class="bi bi-cart-plus"></i>

                        New Purchase

                    </a>


                    <a
                        href="<?= base_url('pos') ?>"
                        class="quick-action"
                    >

                        <i class="bi bi-shop"></i>

                        Open POS

                    </a>


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


    <!-- =========================================
         RECENT SALES
    ========================================== -->

    <div class="card recent-sales">

        <div class="card-header">

            <h3>
                Recent Sales
            </h3>


            <a
                href="<?= base_url('sales') ?>"
                style="
                    color:#2563eb;
                    font-size:12px;
                    font-weight:600;
                "
            >

                View All

            </a>

        </div>


        <div class="card-body">


            <?php if (!empty($recentSales)): ?>


                <div style="overflow-x:auto;">

                    <table class="sales-table">

                        <thead>

                            <tr>

                                <th>
                                    Invoice
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Payment
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php foreach ($recentSales as $sale): ?>

                                <tr>

                                    <td>

                                        <strong>
                                            <?= esc(
                                                $sale['invoice_number']
                                            ) ?>
                                        </strong>

                                    </td>


                                    <td>

                                        <?= date(
                                            'd M Y, H:i',
                                            strtotime(
                                                $sale['sale_date']
                                            )
                                        ) ?>

                                    </td>


                                    <td>

                                        <span class="payment-badge">

                                            <?= esc(
                                                $sale['payment_method']
                                            ) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <strong>

                                            KES
                                            <?= number_format(
                                                (float) $sale['total'],
                                                2
                                            ) ?>

                                        </strong>

                                    </td>


                                    <td>

                                        <span
                                            class="status-completed"
                                        >

                                            <i
                                                class="bi bi-check-circle"
                                            ></i>

                                            Completed

                                        </span>

                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        </tbody>

                    </table>

                </div>


            <?php else: ?>


                <div
                    style="
                        text-align:center;
                        padding:35px;
                        color:#94a3b8;
                    "
                >

                    <i
                        class="bi bi-receipt"
                        style="
                            font-size:35px;
                            display:block;
                            margin-bottom:10px;
                        "
                    ></i>

                    No completed sales yet.

                </div>


            <?php endif; ?>


        </div>

    </div>


</main>


<script>

    const sidebar =
        document.getElementById('sidebar');

    const main =
        document.getElementById('main');

    const toggle =
        document.getElementById('toggleSidebar');


    if (toggle && sidebar && main) {

        toggle.addEventListener('click', function () {

            sidebar.classList.toggle('hidden');

            main.classList.toggle('expanded');

        });

    }

</script>


</body>

</html>