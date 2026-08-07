<?php

$cart = session()->get('cart') ?? [];

$subtotal = 0;

foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$discount = 0;
$tax = $subtotal * 0.16;
$total = $subtotal + $tax - $discount;
?>
<div class="checkout-summary">

    <!-- Summary -->
    <div class="mb-4">

        <div class="d-flex justify-content-between mb-2">

            <span class="text-muted">
                Subtotal
            </span>

            <strong>
                KES <?= number_format($subtotal, 2) ?>
            </strong>

        </div>

        <div class="d-flex justify-content-between mb-2">

            <span class="text-muted">
                Discount
            </span>

            <strong class="text-success">
                -KES <?= number_format($discount, 2) ?>
            </strong>

        </div>

        <div class="d-flex justify-content-between mb-2">

            <span class="text-muted">
                Tax (16%)
            </span>

            <strong>
                KES <?= number_format($tax, 2) ?>
            </strong>

        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">
                Total
            </h5>

            <h4 class="fw-bold text-primary mb-0">
                KES <?= number_format($total, 2) ?>
            </h4>

        </div>

    </div>

    <!-- Payment Method -->
    <div class="mb-3">

        <label class="form-label fw-semibold">

            Payment Method

        </label>

        <select class="form-select" disabled>

            <option selected>
                Cash
            </option>

            <option>
                M-Pesa
            </option>

            <option>
                Card
            </option>

            <option>
                Bank Transfer
            </option>

        </select>

    </div>

    <!-- Amount Paid -->
    <div class="mb-3">

        <label class="form-label fw-semibold">

            Amount Received

        </label>

        <input
            type="number"
            class="form-control"
            placeholder="0.00"
            disabled>

    </div>

    <!-- Change -->
    <div class="mb-4">

        <div class="alert alert-light border d-flex justify-content-between align-items-center mb-0">

            <span class="fw-semibold">

                Change

            </span>

            <span class="fs-5 fw-bold text-success">

                KES 0.00

            </span>

        </div>

    </div>

    <!-- Buttons -->
    <div class="d-grid gap-2">

        <button
            class="btn btn-success btn-lg rounded-3"
            disabled>

            <i class="bi bi-check-circle me-2"></i>

            Complete Sale

        </button>

        <button
            class="btn btn-outline-secondary rounded-3"
            disabled>

            <i class="bi bi-save me-2"></i>

            Save as Draft

        </button>

    </div>

</div>