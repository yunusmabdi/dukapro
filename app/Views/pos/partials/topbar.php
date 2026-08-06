<header class="pos-topbar">

    <!-- Left -->
    <div class="d-flex align-items-center gap-4">

        <!-- Logo -->
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

    <!-- Center -->
    <div style="width:40%;">

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
    <div class="d-flex align-items-center gap-3">

        <!-- Customer -->
        <button
            class="btn btn-light border rounded-3"
            data-bs-toggle="modal"
            data-bs-target="#customerModal">

            <i class="bi bi-person me-2"></i>

            Customer

        </button>

        <!-- New Customer -->
        <button
            class="btn btn-primary rounded-3">

            <i class="bi bi-person-plus me-2"></i>

            New

        </button>

        <!-- Cart -->
        <button class="btn btn-light border rounded-3 position-relative">

            <i class="bi bi-cart3 fs-5"></i>

            <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                0

            </span>

        </button>

        <!-- Cashier -->
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

        <!-- Exit -->
        <a
            href="<?= base_url() ?>"
            class="btn btn-outline-secondary rounded-3">

            <i class="bi bi-x-circle me-2"></i>

            Exit POS

        </a>

    </div>

</header>