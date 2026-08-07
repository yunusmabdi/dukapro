<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <!-- Left -->
            <div class="d-flex align-items-center gap-4">

                <div class="d-flex align-items-center">

                    <div
                        class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                        style="width:48px;height:48px;">

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

            <!-- Search -->
            <div class="flex-grow-1" style="max-width:450px;">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>

                    <input
                        type="text"
                        class="form-control border-start-0 shadow-none"
                        placeholder="Search product, SKU or Barcode...">

                </div>

            </div>

            <!-- Right -->
            <div class="d-flex align-items-center flex-wrap gap-2">

                <button
                    class="btn btn-light border position-relative cart-button">

                    <i class="bi bi-person"></i>

                    <span>Customer</span>

                </button>

                <button
                    class="btn btn-primary d-flex align-items-center"
                    style="background:#2563EB !important; color:#fff !important; border-color:#2563EB !important;">

                    <i class="bi bi-person-plus"></i>

                    <span style="color:#fff !important;">
                        New
                    </span>

                </button>

                <button class="btn btn-dark position-relative"
                        id="cartButton">

                    <i class="bi bi-cart3"></i>
                    Cart

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="cartCount">

                        <?= count(session()->get('cart') ?? []) ?>

                    </span>

                </button>

                <div class="d-flex align-items-center">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                        style="width:42px;height:42px;">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <div class="ms-2">

                        <div class="fw-semibold">
                            Administrator
                        </div>

                        <small class="text-muted">
                            Cashier
                        </small>

                    </div>

                </div>

                <a
                    href="<?= base_url() ?>"
                    class="btn btn-outline-secondary d-flex align-items-center">

                    <i class="bi bi-x-circle"></i>

                    <span>Exit POS</span>

                </a>

            </div>

        </div>

    </div>

</div>