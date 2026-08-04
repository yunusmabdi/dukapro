<aside class="sidebar">

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

        <img src="https://i.pravatar.cc/80" alt="">

        <div>
            <h4>Administrator</h4>
            <p>
                <span class="status"></span>
                Online
            </p>
        </div>

    </div>

    <span class="menu-title">MAIN</span>

    <ul class="sidebar-menu">

        <li>
            <a href="<?= base_url() ?>"
            class="<?= service('uri')->getSegment(1) == '' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

    </ul>

    <span class="menu-title">INVENTORY</span>

    <ul class="sidebar-menu">

        <li>
            <a href="<?= base_url('products') ?>"
            class="<?= service('uri')->getSegment(1) == 'products' ? 'active' : '' ?>">
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
        <li class="nav-item">
            <a href="<?= base_url('suppliers') ?>" class="nav-link">

                <i class="bi bi-truck"></i>

                <span>Suppliers</span>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('inventory') ?>" class="nav-link">
                <i class="bi bi-boxes me-2"></i>
                <span>Inventory</span>
            </a>
        </li>

    </ul>

    <span class="menu-title">SALES</span>

    <ul class="sidebar-menu">

        <li><a href="#"><i class="bi bi-shop"></i> Sales</a></li>

        <li><a href="#"><i class="bi bi-cart-check"></i> Purchases</a></li>

        <li><a href="#"><i class="bi bi-receipt"></i> Invoices</a></li>

    </ul>

    <span class="menu-title">SYSTEM</span>

    <ul class="sidebar-menu">

        <li><a href="#"><i class="bi bi-people"></i> Users</a></li>

        <li><a href="#"><i class="bi bi-shield-lock"></i> Roles</a></li>

        <li><a href="#"><i class="bi bi-clipboard-data"></i> Reports</a></li>

        <li><a href="#"><i class="bi bi-gear"></i> Settings</a></li>

    </ul>

</aside>