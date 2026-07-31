<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Products</h3>
            <p class="text-muted mb-0">
                Manage your product catalog
            </p>
        </div>

        <a href="<?= base_url('products/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Add Product
        </a>

    </div>

    <!-- Success Message -->
    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <?= session()->getFlashdata('success') ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>

    <!-- Products Table -->
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
                            <th>Brand</th>
                            <th>Stock</th>
                            <th>Selling Price</th>
                            <th>Status</th>
                            <th width="180" class="text-center">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($products)) : ?>

                            <?php foreach ($products as $product) : ?>

                                <tr>

                                    <td>
                                        <span class="fw-semibold text-primary">
                                            <?= esc($product['sku']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= esc($product['name']) ?>
                                    </td>

                                    <td>
                                        <?= esc($product['category_name'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($product['supplier_name'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($product['brand']) ?>
                                    </td>

                                    <td>

                                        <?php if ($product['stock'] <= $product['min_stock']) : ?>

                                            <span class="badge bg-danger">
                                                <?= $product['stock'] ?>
                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-success">
                                                <?= $product['stock'] ?>
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        KES <?= number_format($product['selling_price'], 2) ?>
                                    </td>

                                    <td>

                                        <?php if ($product['status'] === 'Active') : ?>

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-secondary">
                                                Inactive
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td class="text-center">

                                        <a
                                            href="<?= base_url('products/show/' . $product['id']) ?>"
                                            class="btn btn-sm btn-info text-white"
                                            title="View">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <a
                                            href="<?= base_url('products/edit/' . $product['id']) ?>"
                                            class="btn btn-sm btn-warning"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <a
                                            href="<?= base_url('products/delete/' . $product['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="9" class="text-center py-5">

                                    <i class="bi bi-box-seam fs-1 text-muted d-block mb-3"></i>

                                    <h5>No Products Found</h5>

                                    <p class="text-muted mb-3">
                                        Start by creating your first product.
                                    </p>

                                    <a
                                        href="<?= base_url('products/create') ?>"
                                        class="btn btn-primary">

                                        <i class="bi bi-plus-circle me-2"></i>

                                        Add Product

                                    </a>

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