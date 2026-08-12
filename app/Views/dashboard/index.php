```php
<?php
$segment = service('uri')->getSegment(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NexusERP Dashboard</title>

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

        /*
         * KEEP ALL YOUR EXISTING DASHBOARD CSS HERE.
         *
         * Remove ONLY the sidebar-related CSS that was moved
         * into sidebar.css.
         */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI",
                         Roboto, Helvetica, Arial, sans-serif;

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
        ========================================= */

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
        ========================================= */

        .topbar {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 28px;
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
           SIDEBAR TOGGLE
        ========================================= */

        .toggle-sidebar {
            width: 42px;
            height: 42px;

            border: none;

            border-radius: 12px;

            background: #fff;

            color: #334155;

            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);

            cursor: pointer;

            font-size: 19px;

            transition: all .2s ease;
        }

        .toggle-sidebar:hover {
            background: #2563eb;

            color: #fff;
        }


        /* =========================================
           DATE
        ========================================= */

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
           YOUR EXISTING DASHBOARD CSS
           
           Keep:
           - .stats-grid
           - .stat-card
           - .stat-top
           - .stat-icon
           - .stat-label
           - .stat-value
           - .stat-change
           - .dashboard-grid
           - .card
           - .card-header
           - .card-body
           - .chart
           - .quick-actions
           - .quick-action
           - responsive dashboard CSS
        ========================================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
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
        }

        .stat-change {
            font-size: 12px;
            color: #16a34a;
        }

        .stat-change.warning {
            color: #dc2626;
        }

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

            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
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
        }

        .card-header span {
            color: #64748b;
            font-size: 12px;
        }

        .card-body {
            padding: 20px;
        }

        .chart {
            height: 280px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #94a3b8;

            background:
                repeating-linear-gradient(
                    to bottom,
                    transparent,
                    transparent 55px,
                    #f1f5f9 56px
                );

            border-radius: 12px;
        }

        .quick-actions {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

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
           RESPONSIVE DASHBOARD
        ========================================= */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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

        }

    </style>

</head>


<body>

    <!-- SIDEBAR -->
    <?= view('partials/sidebar') ?>


    <!-- MAIN -->
    <main class="main" id="main">

        <!-- TOP BAR -->
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


        <!-- PAGE TITLE -->
        <div class="page-title">

            <h1>Dashboard</h1>

            <p>
                Welcome back,
                <?= session('user_name') ?? 'Administrator' ?>.
                Here's what's happening with your business today.
            </p>

        </div>


        <br>


        <!-- YOUR EXISTING DASHBOARD CONTENT GOES HERE -->

        <!-- STATISTICS -->
        <div class="stats-grid">

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
                    KES 245,000
                </div>

                <div class="stat-change">
                    <i class="bi bi-arrow-up"></i>
                    12.5% vs yesterday
                </div>

            </div>


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
                    128
                </div>

                <div class="stat-change">
                    <i class="bi bi-arrow-up"></i>
                    8.2% vs yesterday
                </div>

            </div>


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
                    1,250
                </div>

                <div class="stat-change">
                    All active products
                </div>

            </div>


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
                    18
                </div>

                <div class="stat-change warning">
                    Requires attention
                </div>

            </div>

        </div>


        <!-- LOWER DASHBOARD -->
        <div class="dashboard-grid">

            <div class="card">

                <div class="card-header">

                    <h3>Sales Overview</h3>

                    <span>
                        Last 7 days
                    </span>

                </div>

                <div class="card-body">

                    <div class="chart">
                        Sales chart will appear here
                    </div>

                </div>

            </div>


            <div class="card">

                <div class="card-header">

                    <h3>Quick Actions</h3>

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

    </main>


    <!-- SIDEBAR TOGGLE -->
    <script>

        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');
        const toggle = document.getElementById('toggleSidebar');

        toggle.addEventListener('click', function () {

            sidebar.classList.toggle('hidden');
            main.classList.toggle('expanded');

        });

    </script>

</body>

</html>
```
