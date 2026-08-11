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

    <form
        id="checkoutForm"
        method="POST"
        action="<?= base_url('checkout') ?>"
    >

        <?= csrf_field() ?>

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

                <h4
                    class="fw-bold text-primary mb-0"
                    id="checkoutTotal"
                    data-total="<?= number_format($total, 2, '.', '') ?>"
                >
                    KES <?= number_format($total, 2) ?>
                </h4>

            </div>

        </div>


        <!-- Payment Method -->
        <div class="mb-3">

            <label
                for="paymentMethod"
                class="form-label fw-semibold"
            >
                Payment Method
            </label>

            <select
                id="paymentMethod"
                name="payment_method"
                class="form-select"
                required
            >

                <option value="Cash" selected>
                    Cash
                </option>

                <option value="M-Pesa">
                    M-Pesa
                </option>

                <option value="Card">
                    Card
                </option>

            </select>

        </div>


        <!-- Amount Paid -->
        <div class="mb-3">

            <label
                for="amountPaid"
                class="form-label fw-semibold"
            >
                <span id="amountLabel">
                    Amount Received
                </span>
            </label>

            <input
                type="number"
                id="amountPaid"
                name="amount_paid"
                class="form-control"
                placeholder="0.00"
                min="0"
                step="0.01"
                inputmode="decimal"
                required
            >

            <div
                id="amountError"
                class="invalid-feedback"
            >
                Amount received cannot be less than the total.
            </div>

        </div>


        <!-- Payment Reference -->
        <div
            class="mb-3 d-none"
            id="paymentReferenceGroup"
        >

            <label
                for="paymentReference"
                class="form-label fw-semibold"
            >
                Transaction / Reference Number
            </label>

            <input
                type="text"
                id="paymentReference"
                name="payment_reference"
                class="form-control"
                placeholder="Enter transaction/reference number"
                maxlength="100"
            >

            <div
                id="referenceError"
                class="invalid-feedback"
            >
                Transaction/reference number is required.
            </div>

        </div>


        <!-- Change -->
        <div class="mb-4">

            <div
                class="alert alert-light border d-flex justify-content-between align-items-center mb-0"
            >

                <span class="fw-semibold">
                    Change
                </span>

                <span
                    id="checkoutChange"
                    class="fs-5 fw-bold text-success"
                >
                    KES 0.00
                </span>

            </div>

        </div>


        <!-- Checkout Error -->
        <div
            id="checkoutError"
            class="alert alert-danger d-none"
            role="alert"
        ></div>


        <!-- Buttons -->
        <div class="d-grid gap-2">

            <button
                type="submit"
                id="completeSaleButton"
                class="btn btn-success btn-lg rounded-3"
                <?= empty($cart) ? 'disabled' : '' ?>
            >

                <i class="bi bi-check-circle me-2"></i>

                Complete Sale

            </button>


            <button
                type="button"
                class="btn btn-outline-secondary rounded-3"
                disabled
            >

                <i class="bi bi-save me-2"></i>

                Save as Draft

            </button>

        </div>

    </form>

</div>