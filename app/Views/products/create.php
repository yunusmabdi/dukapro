<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Add Product
            </h3>

            <p class="text-muted mb-0">
                Create a new product.
            </p>

        </div>

        <a href="<?= base_url('products') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <form action="<?= base_url('products/store') ?>" method="post">

        <?= view('products/_form', [
            'product' => [],
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]) ?>

    </form>

</div>

<?= $this->endSection() ?>