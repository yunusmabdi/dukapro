<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2>Products</h2>

    <a href="<?= base_url('products/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Add Product
    </a>
</div>

<div class="card">

    <div class="card-header">

        <input
            type="text"
            class="form-control"
            placeholder="Search products..."
        >

    </div>

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>SKU</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="170">Actions</th>

                </tr>

            </thead>

            <tbody>

                <?php if($products): ?>

                    <?php foreach($products as $product): ?>

                        <tr>

                            <td><?= esc($product['sku']) ?></td>

                            <td><?= esc($product['name']) ?></td>

                            <td><?= esc($product['category']) ?></td>

                            <td><?= esc($product['brand']) ?></td>

                            <td>

                                <?php if($product['stock'] <= $product['min_stock']): ?>

                                    <span class="badge badge-danger">

                                        <?= $product['stock'] ?>

                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-success">

                                        <?= $product['stock'] ?>

                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                KES <?= number_format($product['selling_price'],2) ?>

                            </td>

                            <td>

                                <?php if($product['status']=="Active"): ?>

                                    <span class="badge badge-success">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-secondary">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a
                                    href="<?= base_url('products/show/'.$product['id']) ?>"
                                    class="btn btn-info btn-sm"
                                >

                                    View

                                </a>

                                <a
                                    href="<?= base_url('products/edit/'.$product['id']) ?>"
                                    class="btn btn-warning btn-sm"
                                >

                                    Edit

                                </a>

                                <a
                                    href="<?= base_url('products/delete/'.$product['id']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete product?')"
                                >

                                    Delete

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="8" align="center">

                            No products found.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>