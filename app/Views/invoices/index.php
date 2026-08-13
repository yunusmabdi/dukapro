<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- =========================================
         PAGE HEADER
    ========================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Sale History
            </h3>

            <p class="text-muted mb-0">
                View completed sales and receipts.
            </p>

        </div>

        <a
            href="<?= base_url('pos') ?>"
            class="btn btn-primary d-flex align-items-center"
        >

            <i class="bi bi-cart3 me-2"></i>

            Back to POS

        </a>

    </div>


    <!-- =========================================
         FLASH ERROR
    ========================================== -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger rounded-3">

            <i class="bi bi-exclamation-circle me-2"></i>

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <!-- =========================================
         SALES TABLE
    ========================================== -->

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <?php if (empty($sales)): ?>

                <!-- Empty State -->

                <div class="text-center py-5">

                    <div
                        class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width:70px;height:70px;"
                    >

                        <i
                            class="bi bi-receipt text-muted"
                            style="font-size:2rem;"
                        ></i>

                    </div>

                    <h5 class="fw-bold">
                        No Sales Yet
                    </h5>

                    <p class="text-muted mb-0">
                        Completed sales will appear here.
                    </p>

                </div>

            <?php else: ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4 py-3">
                                    Invoice
                                </th>

                                <th class="py-3">
                                    Date
                                </th>

                                <th class="py-3">
                                    Payment
                                </th>

                                <th class="text-end py-3">
                                    Total
                                </th>

                                <th class="py-3">
                                    Status
                                </th>

                                <th class="text-end px-4 py-3">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($sales as $sale): ?>

                                <tr>

                                    <!-- Invoice -->

                                    <td class="px-4">

                                        <span class="fw-semibold">
                                            <?= esc($sale['invoice_number']) ?>
                                        </span>

                                    </td>


                                    <!-- Date -->

                                    <td>

                                        <div class="fw-medium">
                                            <?= date(
                                                'd M Y',
                                                strtotime($sale['sale_date'])
                                            ) ?>
                                        </div>

                                        <small class="text-muted">

                                            <?= date(
                                                'H:i',
                                                strtotime($sale['sale_date'])
                                            ) ?>

                                        </small>

                                    </td>


                                    <!-- Payment -->

                                    <td>

                                        <?php if ($sale['payment_method'] === 'Cash'): ?>

                                            <span class="badge bg-success-subtle text-success px-3 py-2">

                                                <i class="bi bi-cash me-1"></i>

                                                Cash

                                            </span>

                                        <?php elseif ($sale['payment_method'] === 'M-Pesa'): ?>

                                            <span class="badge bg-primary-subtle text-primary px-3 py-2">

                                                <i class="bi bi-phone me-1"></i>

                                                M-Pesa

                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-secondary-subtle text-secondary px-3 py-2">

                                                <i class="bi bi-credit-card me-1"></i>

                                                <?= esc($sale['payment_method']) ?>

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Total -->

                                    <td class="text-end">

                                        <span class="fw-bold">

                                            KES
                                            <?= number_format(
                                                (float) $sale['total'],
                                                2
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <?php if ($sale['status'] === 'Completed'): ?>

                                            <span class="badge bg-success px-3 py-2">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Completed

                                            </span>

                                        <?php elseif ($sale['status'] === 'Cancelled'): ?>

                                            <span class="badge bg-danger px-3 py-2">

                                                <i class="bi bi-x-circle me-1"></i>

                                                Cancelled

                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-warning text-dark px-3 py-2">

                                                <?= esc($sale['status']) ?>

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Action -->

                                    <td class="text-end px-4">

                                        <a
                                            href="<?= base_url('invoices/' . $sale['id']) ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >

                                            <i class="bi bi-eye me-1"></i>

                                            View

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>