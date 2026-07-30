<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h3><?= esc($product['name']) ?></h3>

    </div>

    <div class="card-body">

        <table class="table">

            <tr>
                <th>SKU</th>
                <td><?= esc($product['sku']) ?></td>
            </tr>

            <tr>
                <th>Barcode</th>
                <td><?= esc($product['barcode']) ?></td>
            </tr>

            <tr>
                <th>Category</th>
                <td><?= esc($product['category']) ?></td>
            </tr>

            <tr>
                <th>Brand</th>
                <td><?= esc($product['brand']) ?></td>
            </tr>

            <tr>
                <th>Unit</th>
                <td><?= esc($product['unit']) ?></td>
            </tr>

            <tr>
                <th>Cost Price</th>
                <td>KES <?= number_format($product['cost_price'],2) ?></td>
            </tr>

            <tr>
                <th>Selling Price</th>
                <td>KES <?= number_format($product['selling_price'],2) ?></td>
            </tr>

            <tr>
                <th>Stock</th>
                <td><?= esc($product['stock']) ?></td>
            </tr>

            <tr>
                <th>Minimum Stock</th>
                <td><?= esc($product['min_stock']) ?></td>
            </tr>

            <tr>
                <th>Status</th>
                <td><?= esc($product['status']) ?></td>
            </tr>

        </table>

        <a href="<?= base_url('products') ?>" class="btn btn-secondary">

            Back

        </a>

    </div>

</div>

<?= $this->endSection() ?>