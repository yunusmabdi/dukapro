<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Receipt - <?= esc($sale['invoice_number']) ?>
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        body {
            background: #f5f6f8;
        }

        .receipt-card {
            max-width: 850px;
            margin: 40px auto;
        }

        @media print {

            body {
                background: white;
            }

            .no-print {
                display: none !important;
            }

            .receipt-card {
                margin: 0;
                max-width: none;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card border-0 shadow-sm rounded-4 receipt-card">

        <div class="card-body p-4 p-md-5">

            <!-- Header -->

            <div class="text-center mb-4">

                <div class="mb-2">
                    <i
                        class="bi bi-check-circle-fill text-success"
                        style="font-size: 3rem;"
                    ></i>
                </div>

                <h2 class="fw-bold">
                    Sale Completed
                </h2>

                <p class="text-muted mb-0">
                    The sale was successfully completed.
                </p>

            </div>


            <!-- Invoice Information -->

            <div class="row mb-4">

                <div class="col-md-6">

                    <div class="text-muted small">
                        Invoice Number
                    </div>

                    <div class="fw-bold">
                        <?= esc($sale['invoice_number']) ?>
                    </div>

                </div>

                <div class="col-md-6 text-md-end">

                    <div class="text-muted small">
                        Date
                    </div>

                    <div class="fw-bold">
                        <?= esc($sale['sale_date']) ?>
                    </div>

                </div>

            </div>


            <!-- Items -->

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                    <tr>

                        <th>
                            Product
                        </th>

                        <th class="text-center">
                            Qty
                        </th>

                        <th class="text-end">
                            Unit Price
                        </th>

                        <th class="text-end">
                            Total
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($items as $item): ?>

                        <tr>

                            <td>

                                <div class="fw-semibold">
                                    <?= esc($item['product_name']) ?>
                                </div>

                                <small class="text-muted">
                                    <?= esc($item['product_sku']) ?>
                                </small>

                            </td>

                            <td class="text-center">
                                <?= number_format((float) $item['quantity'], 2) ?>
                            </td>

                            <td class="text-end">
                                KES <?= number_format((float) $item['unit_price'], 2) ?>
                            </td>

                            <td class="text-end fw-semibold">
                                KES <?= number_format((float) $item['total'], 2) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <hr>


            <!-- Totals -->

            <div class="row justify-content-end">

                <div class="col-md-5">

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Subtotal
                        </span>

                        <strong>
                            KES <?= number_format((float) $sale['subtotal'], 2) ?>
                        </strong>

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Discount
                        </span>

                        <strong>
                            KES <?= number_format((float) $sale['discount'], 2) ?>
                        </strong>

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Tax
                        </span>

                        <strong>
                            KES <?= number_format((float) $sale['tax'], 2) ?>
                        </strong>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-3">

                        <span class="fw-bold">
                            Total
                        </span>

                        <span class="fw-bold text-primary fs-5">
                            KES <?= number_format((float) $sale['total'], 2) ?>
                        </span>

                    </div>

                </div>

            </div>


            <!-- Payment -->

            <div class="card bg-light border-0 rounded-3 mb-4">

                <div class="card-body">

                    <h6 class="fw-bold mb-3">
                        Payment Details
                    </h6>

                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="text-muted small">
                                Method
                            </div>

                            <div class="fw-semibold">
                                <?= esc($sale['payment_method']) ?>
                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="text-muted small">
                                Amount Paid
                            </div>

                            <div class="fw-semibold">
                                KES <?= number_format((float) $sale['amount_paid'], 2) ?>
                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="text-muted small">
                                Change
                            </div>

                            <div class="fw-semibold">
                                KES <?= number_format((float) $sale['change_amount'], 2) ?>
                            </div>

                        </div>


                        <?php if (!empty($sale['payment_reference'])): ?>

                            <div class="col-12">

                                <div class="text-muted small">
                                    Transaction / Reference Number
                                </div>

                                <div class="fw-semibold">
                                    <?= esc($sale['payment_reference']) ?>
                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            <!-- Actions -->

            <div class="d-flex justify-content-center gap-2 no-print">

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="window.print()"
                >
                    <i class="bi bi-printer me-2"></i>
                    Print Receipt
                </button>

                <a
                    href="<?= base_url('pos') ?>"
                    class="btn btn-outline-secondary"
                >
                    <i class="bi bi-cart3 me-2"></i>
                    New Sale
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>