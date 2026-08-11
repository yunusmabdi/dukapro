<?php

$segment = service('uri')->getSegment(1);

$userRole = session('user_role');
$userName = session('user_name') ?? 'User';

?>

<aside class="sidebar">

    <!-- ========================================= -->
    <!-- LOGO -->
    <!-- ========================================= -->

    <div class="logo">

        <div class="logo-icon">
            <i class="bi bi-grid-fill"></i>
        </div>

        <div>
            <h3>NexusERP</h3>
            <small>Enterprise Suite</small>
        </div>

    </div>


    <!-- ========================================= -->
    <!-- USER -->
    <!-- ========================================= -->

    <div class="user-card">

        <img
            src="https://i.pravatar.cc/80"
            alt="User"
        >

        <div>

            <h4><?= esc($userName) ?></h4>

            <p>

                <span class="status"></span>

                <?= esc($userRole ?? 'User') ?>

            </p>

        </div>

    </div>


    <?php if ($userRole === 'Administrator'): ?>


        <!-- ===================================== -->
        <!-- MAIN -->
        <!-- ===================================== -->

        <span class="menu-title">
            MAIN
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url() ?>"
                    class="<?= $segment === '' ? 'active' : '' ?>"
                >

                    <i class="bi bi-speedometer2"></i>

                    <span>Dashboard</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- INVENTORY -->
        <!-- ===================================== -->

        <span class="menu-title">
            INVENTORY
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url('products') ?>"
                    class="<?= $segment === 'products' ? 'active' : '' ?>"
                >

                    <i class="bi bi-box"></i>

                    <span>Products</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('categories') ?>"
                    class="<?= $segment === 'categories' ? 'active' : '' ?>"
                >

                    <i class="bi bi-tags"></i>

                    <span>Categories</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('suppliers') ?>"
                    class="<?= $segment === 'suppliers' ? 'active' : '' ?>"
                >

                    <i class="bi bi-truck"></i>

                    <span>Suppliers</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('inventory') ?>"
                    class="<?= $segment === 'inventory' ? 'active' : '' ?>"
                >

                    <i class="bi bi-boxes"></i>

                    <span>Inventory</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('purchases') ?>"
                    class="<?= $segment === 'purchases' ? 'active' : '' ?>"
                >

                    <i class="bi bi-cart-check"></i>

                    <span>Purchases</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- SALES -->
        <!-- ===================================== -->

        <span class="menu-title">
            SALES
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url('customers') ?>"
                    class="<?= $segment === 'customers' ? 'active' : '' ?>"
                >

                    <i class="bi bi-people"></i>

                    <span>Customers</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('invoices') ?>"
                    class="<?= $segment === 'invoices' ? 'active' : '' ?>"
                >

                    <i class="bi bi-receipt"></i>

                    <span>Invoices</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- POINT OF SALE -->
        <!-- ===================================== -->

        <span class="menu-title">
            POINT OF SALE
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url('pos') ?>"
                    class="<?= $segment === 'pos' ? 'active' : '' ?>"
                >

                    <i class="bi bi-cart4"></i>

                    <span>Launch POS</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- SYSTEM -->
        <!-- ===================================== -->

        <span class="menu-title">
            SYSTEM
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url('users') ?>"
                    class="<?= $segment === 'users' ? 'active' : '' ?>"
                >

                    <i class="bi bi-people-fill"></i>

                    <span>Users</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('roles') ?>"
                    class="<?= $segment === 'roles' ? 'active' : '' ?>"
                >

                    <i class="bi bi-shield-lock"></i>

                    <span>Roles</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('reports') ?>"
                    class="<?= $segment === 'reports' ? 'active' : '' ?>"
                >

                    <i class="bi bi-bar-chart"></i>

                    <span>Reports</span>

                </a>

            </li>


            <li>

                <a
                    href="<?= base_url('settings') ?>"
                    class="<?= $segment === 'settings' ? 'active' : '' ?>"
                >

                    <i class="bi bi-gear"></i>

                    <span>Settings</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- LOGOUT -->
        <!-- ===================================== -->

        <div class="sidebar-footer">

            <a
                href="<?= base_url('logout') ?>"
                class="logout-link"
            >

                <i class="bi bi-box-arrow-left"></i>

                <span>Logout</span>

            </a>

        </div>


    <?php elseif ($userRole === 'Cashier'): ?>


        <!-- ===================================== -->
        <!-- CASHIER -->
        <!-- ===================================== -->

        <span class="menu-title">
            POINT OF SALE
        </span>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="<?= base_url('pos') ?>"
                    class="<?= $segment === 'pos' ? 'active' : '' ?>"
                >

                    <i class="bi bi-cart4"></i>

                    <span>Point of Sale</span>

                </a>

            </li>

        </ul>


        <!-- ===================================== -->
        <!-- CASHIER LOGOUT -->
        <!-- ===================================== -->

        <div class="sidebar-footer">

            <a
                href="<?= base_url('logout') ?>"
                class="logout-link"
            >

                <i class="bi bi-box-arrow-left"></i>

                <span>Logout</span>

            </a>

        </div>


    <?php endif; ?>

</aside>