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
                     LOGGED-IN USER
                ====================================== -->

                <div class="d-flex align-items-center">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                        style="width:42px;height:42px;"
                    >

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <div class="ms-2">

                        <div class="fw-semibold">

                            <?= session('user_name') ?? 'User' ?>

                        </div>

                        <small class="text-muted">

                            <?= session('user_role') ?? 'Cashier' ?>

                        </small>

                    </div>

                </div>


                <!-- =====================================
                     CASHIER LOGOUT / ADMIN EXIT
                ====================================== -->

                <?php if (session('user_role') === 'Cashier'): ?>

                    <!-- CASHIER LOGOUT -->

                    <a
                        href="<?= base_url('logout') ?>"
                        class="btn btn-outline-danger d-flex align-items-center"
                    >

                        <i class="bi bi-box-arrow-right me-1"></i>

                        <span>
                            Logout
                        </span>

                    </a>

                <?php else: ?>

                    <!-- ADMIN EXIT POS -->

                    <a
                        href="<?= base_url('dashboard') ?>"
                        class="btn btn-outline-secondary d-flex align-items-center"
                    >

                        <i class="bi bi-x-circle me-1"></i>

                        <span>
                            Exit POS
                        </span>

                    </a>

                <?php endif; ?>


            </div>

        </div>

    </div>

</div>