<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Sale History
            </h3>

            <p class="text-muted mb-0">
                View completed sales, payment details and receipts.
            </p>
        </div>

        <a
            href="<?= base_url('pos') ?>"
            class="btn btn-primary"
        >
            <i class="bi bi-cart3 me-2"></i>
            Open POS
        </a>

    </div>


    <!-- Flash Error -->
    <?php if ($error = session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <i class="bi bi-exclamation-circle me-2"></i>

            <?= esc($error) ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    <?php endif; ?>


    <!-- Sales Card -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 py-3 px-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="fw-bold mb-1">
                        Completed Sales
                    </h5>

                    <small class="text-muted">
                        <?= count($sales ?? []) ?> sales recorded
                    </small>
                </div>

                <span class="text-muted">
                    <i class="bi bi-receipt me-1"></i>
                    Sales Records
                </span>

            </div>

        </div>


        <div class="card-body p-0">

            <?php if (empty($sales)): ?>

                <!-- Empty State -->
                <div class="text-center py-5 px-3">

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

                    <p class="text-muted mb-3">
                        Completed sales will appear here.
                    </p>

                    <a
                        href="<?= base_url('pos') ?>"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-cart3 me-2"></i>
                        Make a Sale
                    </a>

                </div>

            <?php else: ?>

                <!-- Sales Table -->
                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0 data-table">

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

                                <?php

                                $paymentMethod =
                                    $sale['payment_method'] ?? '';

                                $status =
                                    $sale['status'] ?? '';

                                $paymentClass = 'bg-secondary-subtle text-secondary';
                                $paymentIcon = 'bi-credit-card';

                                if ($paymentMethod === 'Cash') {

                                    $paymentClass =
                                        'bg-success-subtle text-success';

                                    $paymentIcon = 'bi-cash';

                                } elseif ($paymentMethod === 'M-Pesa') {

                                    $paymentClass =
                                        'bg-primary-subtle text-primary';

                                    $paymentIcon = 'bi-phone';

                                }

                                ?>

                                <tr>

                                    <!-- Invoice -->
                                    <td class="px-4">

                                        <div class="fw-semibold">

                                            <?= esc(
                                                $sale['invoice_number']
                                            ) ?>

                                        </div>

                                        <small class="text-muted">
                                            #<?= esc($sale['id']) ?>
                                        </small>

                                    </td>


                                    <!-- Date -->
                                    <td>

                                        <?php
                                        $saleDate = strtotime(
                                            $sale['sale_date']
                                        );
                                        ?>

                                        <div class="fw-medium">

                                            <?= date(
                                                'd M Y',
                                                $saleDate
                                            ) ?>

                                        </div>

                                        <small class="text-muted">

                                            <?= date(
                                                'H:i',
                                                $saleDate
                                            ) ?>

                                        </small>

                                    </td>


                                    <!-- Payment -->
                                    <td>

                                        <span
                                            class="badge <?= $paymentClass ?> px-3 py-2"
                                        >

                                            <i
                                                class="bi <?= $paymentIcon ?> me-1"
                                            ></i>

                                            <?= esc(
                                                $paymentMethod
                                            ) ?>

                                        </span>

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

                                        <?php if ($status === 'Completed'): ?>

                                            <span
                                                class="badge bg-success px-3 py-2"
                                            >

                                                <i
                                                    class="bi bi-check-circle me-1"
                                                ></i>

                                                Completed

                                            </span>

                                        <?php elseif ($status === 'Cancelled'): ?>

                                            <span
                                                class="badge bg-danger px-3 py-2"
                                            >

                                                <i
                                                    class="bi bi-x-circle me-1"
                                                ></i>

                                                Cancelled

                                            </span>

                                        <?php else: ?>

                                            <span
                                                class="badge bg-warning text-dark px-3 py-2"
                                            >

                                                <?= esc($status) ?>

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Action -->
                                    <td class="text-end px-4">

                                        <a
                                            href="<?= base_url(
                                                'invoices/' . $sale['id']
                                            ) ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >

                                            <i
                                                class="bi bi-eye me-1"
                                            ></i>

                                            View Receipt

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