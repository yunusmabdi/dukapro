<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Purchase
            </h3>

            <p class="text-muted mb-0">
                Update purchase information and purchased items.
            </p>

        </div>

        <a
            href="<?= site_url('purchases') ?>"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>
            Back to Purchases

        </a>

    </div>

    <!-- Validation Errors -->
    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <strong>Please correct the highlighted errors below.</strong>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                action="<?= site_url('purchases/update/' . $purchase['id']) ?>"
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
                        Update Purchase

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>