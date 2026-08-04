<?php

$purchase = $purchase ?? null;
$suppliers = $suppliers ?? [];
$products = $products ?? [];

$isEdit = isset($purchase);

$oldItems = old('items');

if ($oldItems !== null) {
    $items = $oldItems;
} elseif ($isEdit && isset($purchaseItems)) {
    $items = [];

    foreach ($purchaseItems as $item) {
        $items[] = [
            'product_id' => $item['product_id'],
            'quantity'   => $item['quantity'],
            'cost_price' => $item['cost_price'],
        ];
    }
} else {
    $items = [
        [
            'product_id' => '',
            'quantity'   => 1,
            'cost_price' => '',
        ],
    ];
}

?>

<!-- Supplier / Purchase Info -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0 fw-semibold">
            Purchase Details
        </h5>
    </div>

    <div class="card-body">

        <div class="row">

            <!-- Supplier -->
            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    Supplier <span class="text-danger">*</span>
                </label>

                <select
                    name="supplier_id"
                    class="form-select <?= session('errors.supplier_id') ? 'is-invalid' : '' ?>"
                    required>

                    <option value="">
                        Select Supplier
                    </option>

                    <?php foreach ($suppliers as $supplier): ?>

                        <option
                            value="<?= esc($supplier['id']) ?>"
                            <?= old('supplier_id', $purchase['supplier_id'] ?? '') == $supplier['id'] ? 'selected' : '' ?>>

                            <?= esc($supplier['company_name']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

                <?php if (session('errors.supplier_id')): ?>

                    <div class="invalid-feedback">
                        <?= session('errors.supplier_id') ?>
                    </div>

                <?php endif; ?>

            </div>

            <!-- Purchase Date -->
            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    Purchase Date <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="purchase_date"
                    class="form-control <?= session('errors.purchase_date') ? 'is-invalid' : '' ?>"
                    value="<?= old('purchase_date', $purchase['purchase_date'] ?? date('Y-m-d')) ?>"
                    required>

                <?php if (session('errors.purchase_date')): ?>

                    <div class="invalid-feedback">
                        <?= session('errors.purchase_date') ?>
                    </div>

                <?php endif; ?>

            </div>

            <!-- Status -->
            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    Status <span class="text-danger">*</span>
                </label>

                <?php
                $status = old('status', $purchase['status'] ?? 'Pending');
                ?>

                <select
                    name="status"
                    class="form-select <?= session('errors.status') ? 'is-invalid' : '' ?>"
                    required>

                    <option value="Pending" <?= $status === 'Pending' ? 'selected' : '' ?>>
                        Pending
                    </option>

                    <option value="Received" <?= $status === 'Received' ? 'selected' : '' ?>>
                        Received
                    </option>

                    <option value="Cancelled" <?= $status === 'Cancelled' ? 'selected' : '' ?>>
                        Cancelled
                    </option>

                </select>

                <?php if (session('errors.status')): ?>

                    <div class="invalid-feedback">
                        <?= session('errors.status') ?>
                    </div>

                <?php endif; ?>

            </div>

        </div>

        <!-- Notes -->
        <div class="mt-2">

            <label class="form-label fw-semibold">
                Notes
            </label>

            <textarea
                name="notes"
                rows="4"
                class="form-control"><?= esc(old('notes', $purchase['notes'] ?? '')) ?></textarea>

        </div>

    </div>
</div>


<!-- Purchase Items -->
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

        <h5 class="mb-0 fw-semibold">
            Purchase Items
        </h5>

        <button
            type="button"
            class="btn btn-primary"
            id="addItem">

            <i class="bi bi-plus-lg"></i>
            Add Product

        </button>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0" id="itemsTable">

                <thead class="table-light">

                <tr>

                    <th style="width:40%">
                        Product
                    </th>

                    <th style="width:15%">
                        Quantity
                    </th>

                    <th style="width:20%">
                        Cost Price
                    </th>

                    <th style="width:20%">
                        Total
                    </th>

                    <th style="width:5%"></th>

                </tr>

                </thead>

                <tbody>

                <?php foreach ($items as $index => $item): ?>

                    <tr>

                        <td>

                            <select
                                name="items[<?= $index ?>][product_id]"
                                class="form-select product-select"
                                required>

                                <option value="">
                                    Select Product
                                </option>

                                <?php foreach ($products as $product): ?>

                                    <option
                                        value="<?= esc($product['id']) ?>"
                                        data-price="<?= esc($product['cost_price']) ?>"
                                        <?= ($item['product_id'] == $product['id']) ? 'selected' : '' ?>>

                                        <?= esc($product['name']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </td>

                        <td>

                            <input
                                type="number"
                                min="1"
                                class="form-control quantity"
                                name="items[<?= $index ?>][quantity]"
                                value="<?= esc($item['quantity']) ?>"
                                required>

                        </td>

                        <td>

                            <input
                                type="number"
                                step="0.01"
                                min="0"
                                class="form-control cost-price"
                                name="items[<?= $index ?>][cost_price]"
                                value="<?= esc($item['cost_price']) ?>"
                                required>

                        </td>

                        <td>

                            <input
                                type="text"
                                class="form-control line-total bg-light"
                                readonly>

                        </td>

                        <td class="text-center">

                            <button
                                type="button"
                                class="btn btn-outline-danger btn-sm remove-item">

                                <i class="bi bi-trash"></i>

                            </button>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

                <tfoot>

                <tr>

                    <th colspan="3" class="text-end">
                        Subtotal
                    </th>

                    <th>

                        <span id="subtotalText">
                            0.00
                        </span>

                    </th>

                    <th></th>

                </tr>

                <tr>

                    <th colspan="3" class="text-end">
                        Grand Total
                    </th>

                    <th>

                        <span
                            class="fw-bold text-primary fs-5"
                            id="grandTotalText">

                            0.00

                        </span>

                    </th>

                    <th></th>

                </tr>

                </tfoot>

            </table>

        </div>

    </div>

</div>

<input
    type="hidden"
    name="total_amount"
    id="totalAmount"
    value="<?= old('total_amount', $purchase['total_amount'] ?? 0) ?>">

<script>

document.addEventListener('DOMContentLoaded', function () {

    const tableBody = document.querySelector('#itemsTable tbody');
    const addButton = document.getElementById('addItem');

    function bindRow(row)
    {
        const product = row.querySelector('.product-select');
        const quantity = row.querySelector('.quantity');
        const cost = row.querySelector('.cost-price');

        product.addEventListener('change', function () {

            const option = this.options[this.selectedIndex];

            if (option.dataset.price && !cost.value) {
                cost.value = option.dataset.price;
            }

            calculateRow(row);

        });

        quantity.addEventListener('input', function () {

            calculateRow(row);

        });

        cost.addEventListener('input', function () {

            calculateRow(row);

        });

        row.querySelector('.remove-item').addEventListener('click', function () {

            if (tableBody.rows.length === 1) {

                alert('At least one purchase item is required.');

                return;
            }

            row.remove();

            renumberRows();

            calculateTotals();

        });

        calculateRow(row);
    }

    function calculateRow(row)
    {
        const qty = parseFloat(row.querySelector('.quantity').value) || 0;
        const cost = parseFloat(row.querySelector('.cost-price').value) || 0;

        const total = qty * cost;

        row.querySelector('.line-total').value = total.toFixed(2);

        calculateTotals();
    }

    function calculateTotals()
    {
        let subtotal = 0;

        document.querySelectorAll('.line-total').forEach(function (input) {

            subtotal += parseFloat(input.value) || 0;

        });

        document.getElementById('subtotalText').textContent = subtotal.toFixed(2);
        document.getElementById('grandTotalText').textContent = subtotal.toFixed(2);
        document.getElementById('totalAmount').value = subtotal.toFixed(2);
    }

    function renumberRows()
    {
        tableBody.querySelectorAll('tr').forEach(function (row, index) {

            row.querySelector('.product-select').name = `items[${index}][product_id]`;
            row.querySelector('.quantity').name = `items[${index}][quantity]`;
            row.querySelector('.cost-price').name = `items[${index}][cost_price]`;

        });
    }

    addButton.addEventListener('click', function () {

        const index = tableBody.rows.length;

        const row = document.createElement('tr');

        row.innerHTML = `
            <td>
                <select
                    name="items[${index}][product_id]"
                    class="form-select product-select"
                    required>

                    <option value="">Select Product</option>

                    <?php foreach ($products as $product): ?>

                    <option
                        value="<?= esc($product['id']) ?>"
                        data-price="<?= esc($product['cost_price']) ?>">

                        <?= esc($product['name']) ?>

                    </option>

                    <?php endforeach; ?>

                </select>
            </td>

            <td>
                <input
                    type="number"
                    min="1"
                    value="1"
                    class="form-control quantity"
                    name="items[${index}][quantity]"
                    required>
            </td>

            <td>
                <input
                    type="number"
                    step="0.01"
                    min="0"
                    class="form-control cost-price"
                    name="items[${index}][cost_price]"
                    required>
            </td>

            <td>
                <input
                    type="text"
                    class="form-control line-total bg-light"
                    readonly>
            </td>

            <td class="text-center">
                <button
                    type="button"
                    class="btn btn-outline-danger btn-sm remove-item">

                    <i class="bi bi-trash"></i>

                </button>
            </td>
        `;

        tableBody.appendChild(row);

        bindRow(row);

    });

    document.querySelectorAll('#itemsTable tbody tr').forEach(function (row) {

        bindRow(row);

    });

});
</script>