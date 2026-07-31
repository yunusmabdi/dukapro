<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Product
            </h3>

            <p class="text-muted mb-0">
                Update product information.
            </p>

        </div>

        <a href="<?= base_url('products') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="<?= base_url('products/update/' . $product['id']) ?>" method="post">

                <?= $this->include('products/_form') ?>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>