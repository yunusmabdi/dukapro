<?= $this->extend('layouts/sales') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- =========================================
         PAGE HEADER
    ========================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Sales History
            </h4>

            <p class="text-muted mb-0">
                View completed sales and transaction details.
            </p>

        </div>

    </div>


    <!-- =========================================
         SUMMARY CARDS
    ========================================== -->

    <div class="row g-3 mb-4">

        <!-- TOTAL TRANSACTIONS -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Transactions
                            </small>

                            <h4 class="fw-bold mb-0 mt-1">
                                <?= count($sales) ?>
                            </h4>

                        </div>

                        <div
                            class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center"
                            style="width:46px;height:46px;"
                        >

                            <i class="bi bi-receipt fs-5"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- COMPLETED -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Completed Sales
                            </small>

                            <h4 class="fw-bold mb-0 mt-1">

                                <?= count(
                                    array_filter(
                                        $sales,
                                        fn($sale) =>
                                            strtolower($sale['status'] ?? '') === 'completed'
                                    )
                                ) ?>

                            </h4>

                        </div>

                        <div
                            class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center"
                            style="width:46px;height:46px;"
                        >

                            <i class="bi bi-check-circle fs-5"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- TOTAL REVENUE -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Revenue
                            </small>

                            <h4 class="fw-bold mb-0 mt-1">

                                KSh
                                <?= number_format(
                                    array_sum(
                                        array_map(
                                            fn($sale) =>
                                                (float) ($sale['total'] ?? 0),
                                            $sales
                                        )
                                    ),
                                    2
                                ) ?>

                            </h4>

                        </div>

                        <div
                            class="bg-warning bg-opacity-10 text-warning rounded-3 d-flex align-items-center justify-content-center"
                            style="width:46px;height:46px;"
                        >

                            <i class="bi bi-cash-stack fs-5"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================
         SALES TABLE
    ========================================== -->

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">


            <!-- TABLE HEADER -->

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Transactions
                    </h5>

                    <small class="text-muted">
                        Recent sales transactions
                    </small>

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Invoice #
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Cashier
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Payment
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-end">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($sales)): ?>

                            <?php foreach ($sales as $sale): ?>

                                <tr>

                                    <!-- INVOICE -->

                                    <td>

                                        <span class="fw-semibold">
                                            <?= esc($sale['invoice_number'] ?? '—') ?>
                                        </span>

                                    </td>


                                    <!-- DATE -->

                                    <td>

                                        <?= !empty($sale['sale_date'])
                                            ? date(
                                                'd M Y, H:i',
                                                strtotime($sale['sale_date'])
                                            )
                                            : '—'
                                        ?>

                                    </td>


                                    <!-- CASHIER -->

                                    <td>
                                        <?= esc($sale['cashier_name'] ?? '—') ?>
                                    </td>


                                    <!-- CUSTOMER -->

                                    <td>

                                        <?php if (!empty($sale['customer_id'])): ?>

                                            Customer #<?= esc($sale['customer_id']) ?>

                                        <?php else: ?>

                                            <span class="text-muted">
                                                Walk-in Customer
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- PAYMENT -->

                                    <td>

                                        <?php
                                            $paymentMethod = strtolower(
                                                trim(
                                                    $sale['payment_method'] ?? ''
                                                )
                                            );
                                        ?>

                                        <?php if ($paymentMethod === 'cash'): ?>

                                            <span class="badge bg-success-subtle text-success">
                                                <i class="bi bi-cash me-1"></i>
                                                Cash
                                            </span>

                                        <?php elseif ($paymentMethod === 'mpesa'): ?>

                                            <span class="badge bg-success-subtle text-success">
                                                <i class="bi bi-phone me-1"></i>
                                                M-Pesa
                                            </span>

                                        <?php elseif ($paymentMethod === 'card'): ?>

                                            <span class="badge bg-primary-subtle text-primary">
                                                <i class="bi bi-credit-card me-1"></i>
                                                Card
                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-secondary-subtle text-secondary">
                                                <?= esc(
                                                    $sale['payment_method'] ?? 'Unknown'
                                                ) ?>
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- TOTAL -->

                                    <td>

                                        <span class="fw-semibold">
                                            KSh
                                            <?= number_format(
                                                (float) ($sale['total'] ?? 0),
                                                2
                                            ) ?>
                                        </span>

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <?php
                                            $status = strtolower(
                                                trim(
                                                    $sale['status'] ?? ''
                                                )
                                            );
                                        ?>

                                        <?php if ($status === 'completed'): ?>

                                            <span class="badge bg-success-subtle text-success">
                                                Completed
                                            </span>

                                        <?php elseif ($status === 'draft'): ?>

                                            <span class="badge bg-warning-subtle text-warning">
                                                Draft
                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-secondary-subtle text-secondary">
                                                <?= esc(
                                                    $sale['status'] ?? 'Unknown'
                                                ) ?>
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- ACTIONS -->

                                    <td class="text-end">

                                        <a
                                            href="<?= base_url('invoices/' . $sale['id']) ?>"
                                            class="btn btn-sm btn-light border"
                                            title="View Sale"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i class="bi bi-receipt fs-1 d-block mb-3"></i>

                                        <h6 class="fw-semibold">
                                            No sales found
                                        </h6>

                                        <p class="mb-0">
                                            Completed sales will appear here.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>