<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">Product Details</h3>

            <p class="text-muted mb-0">
                View product information.
            </p>

        </div>

        <a href="<?= base_url('products') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h4 class="mb-0">

                <?= esc($product['name']) ?>

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">SKU</label>
                    <div><?= esc($product['sku']) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Barcode</label>
                    <div><?= esc($product['barcode']) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Category</label>
                    <div><?= esc($product['category_name'] ?? '-') ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Supplier</label>
                    <div><?= esc($product['supplier_name'] ?? '-') ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Brand</label>
                    <div><?= esc($product['brand']) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Unit</label>
                    <div><?= esc($product['unit']) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Current Stock</label>

                    <?php if ($product['stock'] <= $product['min_stock']) : ?>

                        <div>
                            <span class="badge bg-danger">
                                <?= esc($product['stock']) ?>
                            </span>
                        </div>

                    <?php else : ?>

                        <div>
                            <span class="badge bg-success">
                                <?= esc($product['stock']) ?>
                            </span>
                        </div>

                    <?php endif; ?>

                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Minimum Stock</label>
                    <div><?= esc($product['min_stock']) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Cost Price</label>
                    <div>KES <?= number_format($product['cost_price'], 2) ?></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-semibold text-muted">Selling Price</label>
                    <div>KES <?= number_format($product['selling_price'], 2) ?></div>
                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-semibold text-muted">Status</label>

                    <div>

                        <?php if ($product['status'] === 'Active') : ?>

                            <span class="badge bg-success">

                                Active

                            </span>

                        <?php else : ?>

                            <span class="badge bg-secondary">

                                Inactive

                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer bg-white text-end">

            <a
                href="<?= base_url('products/edit/' . $product['id']) ?>"
                class="btn btn-warning">

                <i class="bi bi-pencil-square me-1"></i>

                Edit

            </a>

            <a
                href="<?= base_url('products') ?>"
                class="btn btn-outline-secondary">

                Back

            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>