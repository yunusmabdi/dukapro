<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Inventory
            </h3>

            <p class="text-muted mb-0">
                Monitor stock levels across all products.
            </p>

        </div>

    </div>


    <!-- Inventory Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="inventoryTable"
                    class="table table-hover align-middle mb-0 data-table">

                    <thead class="table-light">

                        <tr>

                            <th>
                                SKU
                            </th>

                            <th>
                                Product
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Supplier
                            </th>

                            <th>
                                Stock
                            </th>

                            <th>
                                Min Stock
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Inventory Value
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($products)): ?>

                            <?php foreach ($products as $product): ?>

                                <?php

                                    if ($product['stock'] == 0) {

                                        $badge = 'bg-danger';

                                        $status = 'Out of Stock';

                                    } elseif (
                                        $product['stock']
                                        <= $product['min_stock']
                                    ) {

                                        $badge =
                                            'bg-warning text-dark';

                                        $status = 'Low Stock';

                                    } else {

                                        $badge = 'bg-success';

                                        $status = 'In Stock';

                                    }


                                    $inventoryValue =
                                        $product['stock']
                                        * $product['cost_price'];

                                ?>


                                <tr>

                                    <!-- SKU -->

                                    <td>

                                        <span
                                            class="fw-semibold text-primary">

                                            <?= esc(
                                                $product['sku']
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- Product -->

                                    <td>

                                        <?= esc(
                                            $product['name']
                                        ) ?>

                                    </td>


                                    <!-- Category -->

                                    <td>

                                        <?= esc(
                                            $product['category_name']
                                            ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- Supplier -->

                                    <td>

                                        <?= esc(
                                            $product['supplier_name']
                                            ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- Stock -->

                                    <td>

                                        <strong>

                                            <?= esc(
                                                $product['stock']
                                            ) ?>

                                        </strong>

                                    </td>


                                    <!-- Minimum Stock -->

                                    <td>

                                        <?= esc(
                                            $product['min_stock']
                                        ) ?>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <span
                                            class="badge <?= $badge ?>">

                                            <?= esc($status) ?>

                                        </span>

                                    </td>


                                    <!-- Inventory Value -->

                                    <td>

                                        <strong>

                                            KES
                                            <?= number_format(
                                                (float) $inventoryValue,
                                                2
                                            ) ?>

                                        </strong>

                                    </td>

                                </tr>


                            <?php endforeach; ?>


                        <?php else: ?>


                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5">

                                    <i
                                        class="bi bi-box-seam fs-1 text-muted d-block mb-3">
                                    </i>

                                    <h5>
                                        No Inventory Found
                                    </h5>

                                    <p class="text-muted mb-0">

                                        No products have been
                                        added yet.

                                    </p>

                                </td>

                            </tr>


                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     DATATABLE
===================================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        if (
            typeof DataTable === 'undefined'
        ) {

            console.error(
                'DataTables is not loaded.'
            );

            return;

        }


        new DataTable(
            '#inventoryTable',
            {

                pageLength: 10,


                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All']
                ],


                /*
                -----------------------------------------
                Default sorting
                -----------------------------------------
                */

                order: [
                    [1, 'asc']
                ],


                /*
                -----------------------------------------
                Display / Search
                -----------------------------------------
                */

                language: {

                    search: "",

                    searchPlaceholder:
                        "Search inventory...",

                    lengthMenu:
                        "Show _MENU_ products",

                    info:
                        "Showing _START_ to _END_ of _TOTAL_ products",

                    infoEmpty:
                        "No inventory found",

                    zeroRecords:
                        "No matching inventory found",

                    emptyTable:
                        "No inventory available",

                    paginate: {

                        previous: "Previous",

                        next: "Next"

                    }

                }

            }
        );

    }
);

</script>


<?= $this->endSection() ?>