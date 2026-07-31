<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Supplier Code
                </label>

                <input
                    type="text"
                    class="form-control bg-light"
                    value="<?= $supplier['supplier_code'] ?? ($supplierCode ?? 'Auto Generated') ?>"
                    readonly>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Company Name
                </label>

                <input
                    type="text"
                    name="company_name"
                    class="form-control"
                    value="<?= old('company_name', $supplier['company_name'] ?? '') ?>"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Contact Person
                </label>

                <input
                    type="text"
                    name="contact_person"
                    class="form-control"
                    value="<?= old('contact_person', $supplier['contact_person'] ?? '') ?>">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="<?= old('email', $supplier['email'] ?? '') ?>">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="<?= old('phone', $supplier['phone'] ?? '') ?>">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Address
                </label>

                <input
                    type="text"
                    name="address"
                    class="form-control"
                    value="<?= old('address', $supplier['address'] ?? '') ?>">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">
                    Status
                </label>

                <select name="status" class="form-select">

                    <option value="Active"
                        <?= old('status', $supplier['status'] ?? 'Active') == 'Active' ? 'selected' : '' ?>>

                        Active

                    </option>

                    <option value="Inactive"
                        <?= old('status', $supplier['status'] ?? '') == 'Inactive' ? 'selected' : '' ?>>

                        Inactive

                    </option>

                </select>

            </div>

        </div>

        <hr>

        <div class="d-flex justify-content-end gap-2">

            <a href="<?= base_url('suppliers') ?>" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>

                Cancel

            </a>

            <button type="submit" class="btn btn-primary">

                <i class="bi bi-check-circle me-1"></i>

                Save Supplier

            </button>

        </div>

    </div>

</div>