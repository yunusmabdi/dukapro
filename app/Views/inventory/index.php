<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Inventory</h3>
            <p class="text-muted mb-0">
                Monitor stock levels across all products.
            </p>
        </div>

    </div>

    <!-- Inventory Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>SKU</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Stock</th>
                            <th>Min Stock</th>
                            <th>Status</th>
                            <th>Inventory Value</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($products)): ?>

                            <?php foreach ($products as $product): ?>

                                <?php
                                    if ($product['stock'] == 0) {
                                        $badge = 'bg-danger';
                                        $status = 'Out of Stock';
                                    } elseif ($product['stock'] <= $product['min_stock']) {
                                        $badge = 'bg-warning text-dark';
                                        $status = 'Low Stock';
                                    } else {
                                        $badge = 'bg-success';
                                        $status = 'In Stock';
                                    }

                                    $inventoryValue = $product['stock'] * $product['cost_price'];
                                ?>

                                <tr>

                                    <td>
                                        <span class="fw-semibold text-primary">
                                            <?= esc($product['sku']) ?>
                                        </span>
                                    </td>

                                    <td><?= esc($product['name']) ?></td>

                                    <td><?= esc($product['category_name'] ?? '-') ?></td>

                                    <td><?= esc($product['supplier_name'] ?? '-') ?></td>

                                    <td>
                                        <strong><?= $product['stock'] ?></strong>
                                    </td>

                                    <td><?= $product['min_stock'] ?></td>

                                    <td>
                                        <span class="badge <?= $badge ?>">
                                            <?= $status ?>
                                        </span>
                                    </td>

                                    <td>
                                        <strong>
                                            KES <?= number_format($inventoryValue, 2) ?>
                                        </strong>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <i class="bi bi-box-seam fs-1 text-muted d-block mb-3"></i>

                                    <h5>No Inventory Found</h5>

                                    <p class="text-muted">
                                        No products have been added yet.
                                    </p>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>