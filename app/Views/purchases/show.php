<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Purchase Details
            </h3>

            <p class="text-muted mb-0">
                View purchase information and purchased items.
            </p>

        </div>

        <div class="d-flex gap-2">

            <?php if (($purchase['status'] ?? '') === 'Pending'): ?>

                <form
                    action="<?= site_url('purchases/receive/' . $purchase['id']) ?>"
                    method="post">

                    <?= csrf_field() ?>

                    <button
                        type="submit"
                        class="btn btn-success"
                        onclick="return confirm('Mark this purchase as received? This will update inventory.');">

                        <i class="bi bi-box-seam"></i>
                        Receive Purchase

                    </button>

                </form>

            <?php endif; ?>

            <a
                href="<?= site_url('purchases/edit/' . $purchase['id']) ?>"
                class="btn btn-primary">

                <i class="bi bi-pencil-square"></i>
                Edit

            </a>

            <a
                href="<?= site_url('purchases') ?>"
                class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Back

            </a>

        </div>

    </div>

    <div class="row">

        <!-- Purchase Information -->
        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="mb-0 fw-semibold">
                        Purchase Information
                    </h5>

                </div>

                <div class="card-body">

                    <?php
                    $badge = match ($purchase['status']) {

                        'Pending' => 'warning',
                        'Received' => 'success',
                        'Cancelled' => 'danger',
                        default => 'secondary'

                    };
                    ?>

                    <table class="table table-borderless mb-0">

                        <tr>

                            <th width="45%">
                                Purchase No.
                            </th>

                            <td>
                                <?= esc($purchase['purchase_number']) ?>
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Supplier
                            </th>

                            <td>
                                <?= esc($purchase['company_name']) ?>
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Purchase Date
                            </th>

                            <td>
                                <?= date('d M Y', strtotime($purchase['purchase_date'])) ?>
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

                            <td>

                                <span class="badge bg-<?= $badge ?>">

                                    <?= esc($purchase['status']) ?>

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Total Amount
                            </th>

                            <td class="fw-bold">

                                <?= number_format($purchase['total_amount'], 2) ?>

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- Notes -->
        <div class="col-lg-8 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="mb-0 fw-semibold">
                        Notes
                    </h5>

                </div>

                <div class="card-body">

                    <?php if (! empty($purchase['notes'])): ?>

                        <?= nl2br(esc($purchase['notes'])) ?>

                    <?php else: ?>

                        <span class="text-muted">

                            No notes were provided.

                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <!-- Purchase Items -->
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="mb-0 fw-semibold">
                Purchased Items
            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                    <tr>

                        <th>Product</th>

                        <th class="text-center">
                            Quantity
                        </th>

                        <th class="text-end">
                            Unit_cost
                        </th>

                        <th class="text-end">
                            Line Total
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                    $grandTotal = 0;

                    ?>

                    <?php foreach ($purchaseItems as $item): ?>

                        <?php

                        $lineTotal = $item['quantity'] * $item['unit_cost'];

                        $grandTotal += $lineTotal;

                        ?>

                        <tr>

                            <td>

                                <div class="fw-semibold">

                                    <?= esc($item['product_name']) ?>

                                </div>

                                <?php if (! empty($item['sku'])): ?>

                                    <small class="text-muted">

                                        SKU: <?= esc($item['sku']) ?>

                                    </small>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <?= number_format($item['quantity']) ?>

                            </td>

                            <td class="text-end">

                                <?= number_format($item['unit_cost'], 2) ?>

                            </td>

                            <td class="text-end fw-semibold">

                                <?= number_format($lineTotal, 2) ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                    <tfoot class="table-light">

                    <tr>

                        <th colspan="3" class="text-end">

                            Grand Total

                        </th>

                        <th class="text-end text-primary fs-5">

                            <?= number_format($grandTotal, 2) ?>

                        </th>

                    </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>