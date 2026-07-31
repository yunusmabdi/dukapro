<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">

            Supplier Details

        </h3>

        <a href="<?= base_url('suppliers') ?>" class="btn btn-outline-secondary">

            Back

        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h4 class="mb-0">

                <?= esc($supplier['company_name']) ?>

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>Supplier Code</strong><br>
                    <?= esc($supplier['supplier_code']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Contact Person</strong><br>
                    <?= esc($supplier['contact_person']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Email</strong><br>
                    <?= esc($supplier['email']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Phone</strong><br>
                    <?= esc($supplier['phone']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Address</strong><br>
                    <?= esc($supplier['address']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Status</strong><br>

                    <?php if($supplier['status']=='Active'): ?>

                        <span class="badge bg-success">

                            Active

                        </span>

                    <?php else: ?>

                        <span class="badge bg-danger">

                            Inactive

                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="card-footer text-end bg-white">

            <a href="<?= base_url('suppliers/edit/'.$supplier['id']) ?>" class="btn btn-warning">

                <i class="bi bi-pencil"></i>

                Edit

            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>