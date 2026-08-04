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

    <?php $segment = service('uri')->getSegment(1); ?>

    <!-- ================= MAIN ================= -->

    <span class="menu-title">MAIN</span>

    <ul class="sidebar-menu">

        <li>

            <a
                href="<?= base_url() ?>"
                class="<?= $segment === '' ? 'active' : '' ?>">

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>

        </li>

    </ul>

    <!-- ================= INVENTORY ================= -->

    <span class="menu-title">INVENTORY</span>

    <ul class="sidebar-menu">

        <li>

            <a
                href="<?= base_url('products') ?>"
                class="<?= $segment === 'products' ? 'active' : '' ?>">

                <i class="bi bi-box"></i>

                <span>Products</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('categories') ?>"
                class="<?= $segment === 'categories' ? 'active' : '' ?>">

                <i class="bi bi-tags"></i>

                <span>Categories</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('suppliers') ?>"
                class="<?= $segment === 'suppliers' ? 'active' : '' ?>">

                <i class="bi bi-truck"></i>

                <span>Suppliers</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('inventory') ?>"
                class="<?= $segment === 'inventory' ? 'active' : '' ?>">

                <i class="bi bi-boxes"></i>

                <span>Inventory</span>

            </a>

        </li>

    </ul>

    <!-- ================= SALES ================= -->

    <span class="menu-title">SALES</span>

    <ul class="sidebar-menu">

        <li>

            <a
                href="<?= base_url('sales') ?>"
                class="<?= $segment === 'sales' ? 'active' : '' ?>">

                <i class="bi bi-shop"></i>

                <span>Sales</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('purchases') ?>"
                class="<?= $segment === 'purchases' ? 'active' : '' ?>">

                <i class="bi bi-cart-check"></i>

                <span>Purchases</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('invoices') ?>"
                class="<?= $segment === 'invoices' ? 'active' : '' ?>">

                <i class="bi bi-receipt"></i>

                <span>Invoices</span>

            </a>

        </li>

    </ul>

    <!-- ================= SYSTEM ================= -->

    <span class="menu-title">SYSTEM</span>

    <ul class="sidebar-menu">

        <li>

            <a
                href="<?= base_url('users') ?>"
                class="<?= $segment === 'users' ? 'active' : '' ?>">

                <i class="bi bi-people"></i>

                <span>Users</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('roles') ?>"
                class="<?= $segment === 'roles' ? 'active' : '' ?>">

                <i class="bi bi-shield-lock"></i>

                <span>Roles</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('reports') ?>"
                class="<?= $segment === 'reports' ? 'active' : '' ?>">

                <i class="bi bi-clipboard-data"></i>

                <span>Reports</span>

            </a>

        </li>

        <li>

            <a
                href="<?= base_url('settings') ?>"
                class="<?= $segment === 'settings' ? 'active' : '' ?>">

                <i class="bi bi-gear"></i>

                <span>Settings</span>

            </a>

        </li>

    </ul>

</aside>