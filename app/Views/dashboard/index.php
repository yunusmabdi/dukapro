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

    <style>

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
           SIDEBAR
        ========================================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 270px;
            height: 100vh;

            background: #0f172a;
            color: #fff;

            padding: 24px 18px;

            overflow-y: auto;

            transition: width .3s ease,
                        transform .3s ease;

            z-index: 1000;
        }


        /* =========================================
           COLLAPSED SIDEBAR
        ========================================= */

        .sidebar.collapsed {
            width: 82px;
        }


        /* =========================================
           LOGO
        ========================================= */

        .logo {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 4px 4px 28px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;

            min-width: 48px;

            border-radius: 14px;

            background: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .logo h3 {
            font-size: 22px;
            font-weight: 700;

            white-space: nowrap;
        }

        .logo small {
            display: block;

            margin-top: 2px;

            color: #94a3b8;

            font-size: 12px;

            white-space: nowrap;
        }


        /* =========================================
           USER CARD
        ========================================= */

        .user-card {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 14px;

            background: #1e293b;

            border-radius: 18px;

            margin-bottom: 28px;

            overflow: hidden;
        }

        .user-card img {
            width: 48px;
            height: 48px;

            min-width: 48px;

            border-radius: 50%;

            object-fit: cover;
        }

        .user-card h4 {
            font-size: 15px;
            margin-bottom: 4px;

            white-space: nowrap;
        }

        .user-card p {
            color: #94a3b8;

            font-size: 12px;

            white-space: nowrap;
        }

        .status {
            display: inline-block;

            width: 8px;
            height: 8px;

            background: #22c55e;

            border-radius: 50%;

            margin-right: 5px;
        }


        /* =========================================
           MENU TITLES
        ========================================= */

        .menu-title {
            display: block;

            color: #64748b;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 1.2px;

            margin: 24px 12px 10px;
        }


        /* =========================================
           MENU
        ========================================= */

        .sidebar-menu {
            list-style: none;

            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 4px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 12px 14px;

            border-radius: 12px;

            color: #cbd5e1;

            font-size: 14px;

            transition: all .2s ease;

            white-space: nowrap;
        }

        .sidebar-menu a i {
            width: 22px;
            min-width: 22px;

            font-size: 18px;

            text-align: center;
        }

        .sidebar-menu a:hover {
            background: #1e293b;

            color: #fff;
        }

        .sidebar-menu a.active {
            background: #2563eb;

            color: #fff;

            box-shadow: 0 6px 18px rgba(37, 99, 235, .25);
        }


        /* =========================================
           COLLAPSED MENU
        ========================================= */

        .sidebar.collapsed .logo > div:last-child,
        .sidebar.collapsed .user-card > div,
        .sidebar.collapsed .menu-title,
        .sidebar.collapsed .sidebar-menu span {
            display: none;
        }

        .sidebar.collapsed .logo {
            justify-content: center;
        }

        .sidebar.collapsed .user-card {
            justify-content: center;
            padding: 10px;
        }

        .sidebar.collapsed .sidebar-menu a {
            justify-content: center;

            padding: 13px;
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
            margin-left: 82px;
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
           STAT CARDS
        ========================================= */

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
        }

        .stat-change {
            font-size: 12px;

            color: #16a34a;
        }

        .stat-change.warning {
            color: #dc2626;
        }


        /* =========================================
           DASHBOARD GRID
        ========================================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 2fr)
                minmax(300px, 1fr);

            gap: 20px;
        }


        /* =========================================
           CARDS
        ========================================= */

        .card {
            background: #fff;

            border: 1px solid #e8edf4;

            border-radius: 18px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, .04);
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


        /* =========================================
           SALES CHART PLACEHOLDER
        ========================================= */

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


        /* =========================================
           QUICK ACTIONS
        ========================================= */

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
           MOBILE
        ========================================= */

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

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .sidebar.collapsed {
                width: 270px;
            }

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


<!-- =========================================
     SIDEBAR
========================================= -->

<aside class="sidebar" id="sidebar">

    <!-- Logo -->

    <div class="logo">

        <div class="logo-icon">
            <i class="bi bi-grid-fill"></i>
        </div>

        <div>
            <h3>NexusERP</h3>
            <small>Enterprise Suite</small>
        </div>

    </div>


    <!-- User -->

    <div class="user-card">

        <img
            src="https://i.pravatar.cc/80"
            alt="User"
        >

        <div>

            <h4>
                <?= session('user_name') ?? 'Administrator' ?>
            </h4>

            <p>
                <span class="status"></span>
                <?= session('user_role') ?? 'Administrator' ?>
            </p>

        </div>

    </div>


    <!-- MAIN -->

    <span class="menu-title">MAIN</span>

    <ul class="sidebar-menu">

        <li>

            <a
                href="<?= base_url('dashboard') ?>"
                class="<?= $segment === 'dashboard' ? 'active' : '' ?>"
            >

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>

        </li>

    </ul>


    <!-- INVENTORY -->

    <span class="menu-title">INVENTORY</span>

    <ul class="sidebar-menu">

        <li>
            <a href="<?= base_url('products') ?>">

                <i class="bi bi-box"></i>

                <span>Products</span>

            </a>
        </li>

        <li>
            <a href="<?= base_url('categories') ?>">

                <i class="bi bi-tags"></i>

                <span>Categories</span>

            </a>
        </li>

        <li>
            <a href="<?= base_url('suppliers') ?>">

                <i class="bi bi-truck"></i>

                <span>Suppliers</span>

            </a>
        </li>

        <li>
            <a href="<?= base_url('inventory') ?>">

                <i class="bi bi-boxes"></i>

                <span>Inventory</span>

            </a>
        </li>

        <li>
            <a href="<?= base_url('purchases') ?>">

                <i class="bi bi-cart-check"></i>

                <span>Purchases</span>

            </a>
        </li>

    </ul>


    <!-- SALES -->

    <span class="menu-title">SALES</span>

    <ul class="sidebar-menu">

        <li>

            <a href="<?= base_url('customers') ?>">

                <i class="bi bi-people"></i>

                <span>Customers</span>

            </a>

        </li>

        <li>

            <a href="<?= base_url('invoices') ?>">

                <i class="bi bi-receipt"></i>

                <span>Invoices</span>

            </a>

        </li>

    </ul>


    <!-- POS -->

    <span class="menu-title">POINT OF SALE</span>

    <ul class="sidebar-menu">

        <li>

            <a href="<?= base_url('pos') ?>">

                <i class="bi bi-cart4"></i>

                <span>Launch POS</span>

            </a>

        </li>

    </ul>


    <!-- SYSTEM -->

    <span class="menu-title">SYSTEM</span>

    <ul class="sidebar-menu">

        <li>

            <a href="<?= base_url('users') ?>">

                <i class="bi bi-people-fill"></i>

                <span>Users</span>

            </a>

        </li>

        <li>

            <a href="<?= base_url('roles') ?>">

                <i class="bi bi-shield-lock"></i>

                <span>Roles</span>

            </a>

        </li>

        <li>

            <a href="<?= base_url('reports') ?>">

                <i class="bi bi-bar-chart"></i>

                <span>Reports</span>

            </a>

        </li>

        <li>

            <a href="<?= base_url('settings') ?>">

                <i class="bi bi-gear"></i>

                <span>Settings</span>

            </a>

        </li>

    </ul>

</aside>



<!-- =========================================
     MAIN
========================================= -->

<main class="main" id="main">


    <!-- TOP BAR -->

    <div class="topbar">

        <button
            class="toggle-sidebar"
            id="toggleSidebar"
            title="Collapse sidebar"
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


    <!-- =====================================
         STATISTICS
    ====================================== -->

    <div class="stats-grid">


        <!-- SALES -->

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


        <!-- ORDERS -->

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


        <!-- PRODUCTS -->

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


        <!-- LOW STOCK -->

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



    <!-- =====================================
         LOWER DASHBOARD
    ====================================== -->

    <div class="dashboard-grid">


        <!-- SALES -->

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


        <!-- QUICK ACTIONS -->

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



<script>

    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const toggle = document.getElementById('toggleSidebar');


    toggle.addEventListener('click', function () {

        sidebar.classList.toggle('collapsed');

        main.classList.toggle('expanded');

    });

</script>


</body>

</html>