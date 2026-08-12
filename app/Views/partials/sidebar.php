<?php
$segment = service('uri')->getSegment(1);
?>

<aside class="sidebar" id="sidebar">

    <!-- LOGO -->
    <div class="logo">

        <div class="logo-icon">
            <i class="bi bi-grid-fill"></i>
        </div>

        <div>
            <h3>NexusERP</h3>
            <small>Enterprise Suite</small>
        </div>

    </div>


    <!-- USER -->
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


    <!-- POINT OF SALE -->
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
    <!-- LOGOUT -->
    <div class="sidebar-logout">

        <a href="<?= base_url('logout') ?>">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>

    </div>

</aside>