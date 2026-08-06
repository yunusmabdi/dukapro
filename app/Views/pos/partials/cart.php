<div class="card border-0 shadow-sm rounded-4 h-100">

    <!-- Header -->
    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">
                    Shopping Cart
                </h5>

                <small class="text-muted">

                    <span id="cart-count">0</span> Items

                </small>

            </div>

            <button
                class="btn btn-sm btn-outline-danger"
                id="clear-cart">

                <i class="bi bi-trash3 me-1"></i>

                Clear

            </button>

        </div>

    </div>

    <!-- Cart Items -->
    <div
        class="card-body"
        id="cart-items">

        <!-- Empty State -->

        <div
            class="text-center py-5"
            id="cart-empty">

            <i class="bi bi-cart-x display-3 text-secondary"></i>

            <h6 class="mt-3 fw-semibold">

                Cart is Empty

            </h6>

            <p class="text-muted mb-0">

                Select products to begin a sale.

            </p>

        </div>

        <!-- Cart Item Template -->
        <!-- Hidden until JS renders -->

    </div>

    <!-- Totals -->

    <div class="border-top px-4 py-3">

        <div class="d-flex justify-content-between mb-2">

            <span class="text-muted">

                Subtotal

            </span>

            <strong id="subtotal">

                KES 0.00

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-2">

            <span class="text-muted">

                Discount

            </span>

            <span>

                KES 0.00

            </span>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span class="text-muted">

                Tax

            </span>

            <span>

                KES 0.00

            </span>

        </div>

        <hr>

        <div class="d-flex justify-content-between mb-4">

            <h5 class="fw-bold">

                Total

            </h5>

            <h4
                class="fw-bold text-primary"
                id="total">

                KES 0.00

            </h4>

        </div>

        <button
            class="btn btn-primary w-100 py-3"
            id="checkout-btn"
            disabled>

            <i class="bi bi-credit-card me-2"></i>

            Complete Sale

        </button>

    </div>

</div>