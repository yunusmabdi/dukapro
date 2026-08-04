<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="row">

            <!-- SKU -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Product SKU</label>

                <input
                    type="text"
                    class="form-control bg-light"
                    value="<?= esc($product['sku'] ?? 'Auto Generated') ?>"
                    readonly>
            </div>

            <!-- Barcode -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Barcode</label>

                <input
                    type="text"
                    class="form-control bg-light"
                    value="<?= esc($product['barcode'] ?? 'Auto Generated') ?>"
                    readonly>
            </div>

            <!-- Product Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Product Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="<?= old('name', $product['name'] ?? '') ?>"
                    required>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Category</label>

                <select
                    name="category_id"
                    class="form-select"
                    required>

                    <option value="">Select Category</option>

                    <?php if (!empty($categories)) : ?>

                        <?php foreach ($categories as $category) : ?>

                            <option
                                value="<?= $category['id'] ?>"
                                <?= old('category_id', $product['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>

                                <?= esc($category['name']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>
            </div>

            <!-- Supplier -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Supplier</label>

                <select
                    name="supplier_id"
                    class="form-select"
                    required>

                    <option value="">Select Supplier</option>

                    <?php if (!empty($suppliers)) : ?>

                        <?php foreach ($suppliers as $supplier) : ?>

                            <option
                                value="<?= $supplier['id'] ?>"
                                <?= old('supplier_id', $product['supplier_id'] ?? '') == $supplier['id'] ? 'selected' : '' ?>>

                                <?= esc($supplier['company_name']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>
            </div>

            <!-- Brand -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Brand</label>

                <input
                    type="text"
                    name="brand"
                    class="form-control"
                    value="<?= old('brand', $product['brand'] ?? '') ?>">
            </div>

            <!-- Unit -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Unit</label>

                <input
                    type="text"
                    name="unit"
                    class="form-control"
                    value="<?= old('unit', $product['unit'] ?? 'Piece') ?>">
            </div>

            <!-- Cost Price -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Cost Price (KES)</label>

                <input
                    type="number"
                    step="0.01"
                    name="cost_price"
                    class="form-control"
                    value="<?= old('cost_price', $product['cost_price'] ?? '') ?>"
                    required>
            </div>

            <!-- Selling Price -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Selling Price (KES)</label>

                <input
                    type="number"
                    step="0.01"
                    name="selling_price"
                    class="form-control"
                    value="<?= old('selling_price', $product['selling_price'] ?? '') ?>"
                    required>
            </div>

            <!-- Stock -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Current Stock</label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="<?= old('stock', $product['stock'] ?? 0) ?>"
                    required>
            </div>

            <!-- Minimum Stock -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Minimum Stock</label>

                <input
                    type="number"
                    name="min_stock"
                    class="form-control"
                    value="<?= old('min_stock', $product['min_stock'] ?? 5) ?>"
                    required>
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Status</label>

                <select
                    name="status"
                    class="form-select">

                    <option
                        value="Active"
                        <?= old('status', $product['status'] ?? 'Active') == 'Active' ? 'selected' : '' ?>>
                        Active
                    </option>

                    <option
                        value="Inactive"
                        <?= old('status', $product['status'] ?? '') == 'Inactive' ? 'selected' : '' ?>>
                        Inactive
                    </option>

                </select>
            </div>

        </div>

        <hr>

        <div class="d-flex justify-content-end gap-2">

            <a
                href="<?= base_url('products') ?>"
                class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>

                Cancel

            </a>

            <button
                type="submit"
                class="btn btn-primary">

                <i class="bi bi-check-circle me-1"></i>

                Save Product

            </button>

        </div>

    </div>

</div>