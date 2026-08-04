<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Create Purchase
            </h3>

            <p class="text-muted mb-0">
                Record a new purchase from a supplier.
            </p>

        </div>

        <a
            href="<?= site_url('purchases') ?>"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>
            Back to Purchases

        </a>

    </div>

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger">

            <strong>Please correct the errors below.</strong>

        </div>

    <?php endif; ?>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                action="<?= site_url('purchases/store') ?>"
                method="post">

                <?= csrf_field() ?>

                <?= $this->include('purchases/_form') ?>

                <div class="d-flex justify-content-end gap-2 mt-4">

                    <a
                        href="<?= site_url('purchases') ?>"
                        class="btn btn-light">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-lg"></i>
                        Save Purchase

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>