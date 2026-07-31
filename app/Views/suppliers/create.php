<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Add Supplier
            </h3>

            <p class="text-muted mb-0">
                Register a new supplier.
            </p>

        </div>

        <a href="<?= base_url('suppliers') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Back

        </a>

    </div>

    <form action="<?= base_url('suppliers/store') ?>" method="post">

        <?= $this->include('suppliers/_form') ?>

    </form>

</div>

<?= $this->endSection() ?>