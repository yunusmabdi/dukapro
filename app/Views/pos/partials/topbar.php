<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


            <!-- =========================================
                 LEFT - POS BRANDING
            ========================================== -->

            <div class="d-flex align-items-center gap-4">

                <div class="d-flex align-items-center">

                    <div
                        class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                        style="width:48px;height:48px;"
                    >

                        <i class="bi bi-grid-fill fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <h5 class="fw-bold mb-0">
                            NexusERP POS
                        </h5>

                        <small class="text-muted">
                            Point of Sale
                        </small>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 SEARCH
            ========================================== -->

            <div
                class="flex-grow-1"
                style="max-width:450px;"
            >

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search"></i>

                    </span>

                    <input
                        type="text"
                        id="productSearch"
                        class="form-control border-start-0 shadow-none"
                        placeholder="Search product, SKU or Barcode..."
                    >

                </div>

            </div>


            <!-- =========================================
                 RIGHT - POS ACTIONS
            ========================================== -->

            <div class="d-flex align-items-center flex-wrap gap-2">


                <!-- CUSTOMER -->

                <button
                    class="btn btn-light border position-relative cart-button"
                    type="button"
                >

                    <i class="bi bi-person"></i>

                    <span>Customer</span>

                </button>


                <!-- NEW CUSTOMER -->

                <button
                    class="btn btn-primary d-flex align-items-center"
                    type="button"
                    style="
                        background:#2563EB !important;
                        color:#fff !important;
                        border-color:#2563EB !important;
                    "
                >

                    <i class="bi bi-person-plus me-1"></i>

                    <span style="color:#fff !important;">
                        New
                    </span>

                </button>


                <!-- CART -->

                <button
                    class="btn btn-dark position-relative"
                    id="cartButton"
                    type="button"
                >

                    <i class="bi bi-cart3"></i>

                    Cart

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="cartCount"
                    >

                        <?= count(session()->get('cart') ?? []) ?>

                    </span>

                </button>


                <!-- =====================================
                     LOGGED-IN USER DROPDOWN
                ====================================== -->

                <div class="dropdown">

                    <button
                        class="btn btn-light border-0 d-flex align-items-center p-1 pe-2"
                        type="button"
                        id="userDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        <!-- Avatar -->

                        <div
                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                            style="width:42px;height:42px;"
                        >

                            <i class="bi bi-person-fill"></i>

                        </div>


                        <!-- User Details -->

                        <div class="ms-2 text-start">

                            <div class="fw-semibold">

                                <?= esc(session('user_name') ?? 'User') ?>

                            </div>

                            <small class="text-muted">

                                <?= esc(session('user_role') ?? 'Cashier') ?>

                            </small>

                        </div>


                        <!-- Arrow -->

                        <i class="bi bi-chevron-down ms-3 text-muted"></i>

                    </button>


                    <!-- Dropdown Menu -->

                    <ul
                        class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2"
                        aria-labelledby="userDropdown"
                        style="min-width:210px;"
                    >

                        <!-- User Header -->

                        <li>

                            <div class="px-3 py-2">

                                <div class="fw-semibold">

                                    <?= esc(session('user_name') ?? 'User') ?>

                                </div>

                                <small class="text-muted">

                                    <?= esc(session('user_role') ?? 'Cashier') ?>

                                </small>

                            </div>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <!-- SALE HISTORY -->

                        <li>

                            <a
                                class="dropdown-item d-flex align-items-center gap-2 py-2"
                                href="<?= base_url('invoices') ?>"
                            >

                                <i class="bi bi-receipt text-primary"></i>

                                <span>
                                    Sale History
                                </span>

                            </a>

                        </li>


                        <?php if (session('user_role') === 'Cashier'): ?>

                            <!-- LOGOUT -->

                            <li>

                                <a
                                    class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger"
                                    href="<?= base_url('logout') ?>"
                                >

                                    <i class="bi bi-box-arrow-right"></i>

                                    <span>
                                        Logout
                                    </span>

                                </a>

                            </li>

                        <?php else: ?>

                            <!-- EXIT POS -->

                            <li>

                                <a
                                    class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    href="<?= base_url('dashboard') ?>"
                                >

                                    <i class="bi bi-x-circle text-secondary"></i>

                                    <span>
                                        Exit POS
                                    </span>

                                </a>

                            </li>

                        <?php endif; ?>

                    </ul>

                </div>


            </div>

        </div>

    </div>

</div>