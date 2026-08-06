<!-- Customer Modal -->
<div
    class="modal fade"
    id="customerModal"
    tabindex="-1"
    aria-labelledby="customerModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content border-0 shadow rounded-4">

            <!-- Header -->
            <div class="modal-header border-0">

                <div>

                    <h4
                        class="modal-title fw-bold"
                        id="customerModalLabel">

                        Customers

                    </h4>

                    <small class="text-muted">
                        Select an existing customer or create a new one.
                    </small>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>

            </div>

            <!-- Body -->
            <div class="modal-body">

                <!-- Search -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Search Customer
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search by name, phone or email..."
                            disabled>

                    </div>

                </div>

                <!-- Customer List -->
                <div class="list-group mb-4">

                    <button
                        type="button"
                        class="list-group-item list-group-item-action">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fw-semibold mb-1">
                                    Walk-in Customer
                                </h6>

                                <small class="text-muted">
                                    Default POS Customer
                                </small>

                            </div>

                            <span class="badge bg-primary">
                                Default
                            </span>

                        </div>

                    </button>

                    <button
                        type="button"
                        class="list-group-item list-group-item-action">

                        <div>

                            <h6 class="fw-semibold mb-1">
                                John Kamau
                            </h6>

                            <small class="text-muted">
                                0712 345 678
                            </small>

                        </div>

                    </button>

                    <button
                        type="button"
                        class="list-group-item list-group-item-action">

                        <div>

                            <h6 class="fw-semibold mb-1">
                                Mary Wanjiku
                            </h6>

                            <small class="text-muted">
                                mary@example.com
                            </small>

                        </div>

                    </button>

                </div>

                <hr>

                <!-- Quick Add Customer -->
                <h5 class="fw-bold mb-3">
                    Quick Add Customer
                </h5>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Customer Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Full name"
                            disabled>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="07XXXXXXXX"
                            disabled>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            placeholder="customer@example.com"
                            disabled>

                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">

                <button
                    type="button"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>

                <button
                    type="button"
                    class="btn btn-primary"
                    disabled>

                    <i class="bi bi-person-plus me-2"></i>

                    Save Customer

                </button>

            </div>

        </div>

    </div>

</div>