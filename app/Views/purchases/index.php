<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Purchases
            </h3>

            <p class="text-muted mb-0">
                Manage supplier purchases and inventory restocking.
            </p>

        </div>

        <a
            href="<?= site_url('purchases/create') ?>"
            class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>
            New Purchase

        </a>

    </div>


    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= esc(session()->getFlashdata('success')) ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- Purchases Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="purchasesTable"
                    class="table table-hover align-middle mb-0 data-table">

                    <thead class="table-light">

                    <tr>

                        <th>#</th>

                        <th>Purchase No.</th>

                        <th>Supplier</th>

                        <th>Purchase Date</th>

                        <th>Status</th>

                        <th class="text-end">
                            Total
                        </th>

                        <th
                            class="text-center"
                            style="width:150px;">

                            Actions

                        </th>

                    </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($purchases)): ?>

                        <?php foreach ($purchases as $purchase): ?>

                            <tr>

                                <!-- ID -->

                                <td>

                                    <?= esc($purchase['id']) ?>

                                </td>


                                <!-- Purchase Number -->

                                <td>

                                    <span class="fw-semibold text-primary">

                                        <?= esc(
                                            $purchase['purchase_number']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Supplier -->

                                <td>

                                    <?= esc(
                                        $purchase['company_name']
                                    ) ?>

                                </td>


                                <!-- Date -->

                                <td>

                                    <?= date(
                                        'd M Y',
                                        strtotime(
                                            $purchase['purchase_date']
                                        )
                                    ) ?>

                                </td>


                                <!-- Status -->

                                <td>

                                    <?php

                                    $badge = match (
                                        $purchase['status']
                                    ) {

                                        'Pending' =>
                                            'warning',

                                        'Received' =>
                                            'success',

                                        'Cancelled' =>
                                            'danger',

                                        default =>
                                            'secondary'

                                    };

                                    ?>

                                    <span
                                        class="badge bg-<?= $badge ?>">

                                        <?= esc(
                                            $purchase['status']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Total -->

                                <td class="text-end fw-semibold">

                                    KES
                                    <?= number_format(
                                        (float) $purchase['total_amount'],
                                        2
                                    ) ?>

                                </td>


                                <!-- Actions -->

                                <td class="text-center">

                                    <div class="dropdown">

                                        <button
                                            class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            type="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">

                                            Actions

                                        </button>


                                        <ul
                                            class="dropdown-menu dropdown-menu-end">


                                            <!-- View -->

                                            <li>

                                                <a
                                                    class="dropdown-item"
                                                    href="<?= site_url(
                                                        'purchases/show/' .
                                                        $purchase['id']
                                                    ) ?>">

                                                    <i
                                                        class="bi bi-eye me-2">
                                                    </i>

                                                    View

                                                </a>

                                            </li>


                                            <?php if (
                                                $purchase['status']
                                                === 'Pending'
                                            ): ?>


                                                <!-- Edit -->

                                                <li>

                                                    <a
                                                        class="dropdown-item"
                                                        href="<?= site_url(
                                                            'purchases/edit/' .
                                                            $purchase['id']
                                                        ) ?>">

                                                        <i
                                                            class="bi bi-pencil me-2">
                                                        </i>

                                                        Edit

                                                    </a>

                                                </li>


                                                <li>

                                                    <hr
                                                        class="dropdown-divider">

                                                </li>


                                                <!-- Receive -->

                                                <li>

                                                    <form
                                                        action="<?= site_url(
                                                            'purchases/receive/' .
                                                            $purchase['id']
                                                        ) ?>"
                                                        method="post">

                                                        <?= csrf_field() ?>

                                                        <button
                                                            type="submit"
                                                            class="dropdown-item text-success"
                                                            onclick="return confirm('Receive this purchase and update inventory?')">

                                                            <i
                                                                class="bi bi-box-seam me-2">
                                                            </i>

                                                            Receive Purchase

                                                        </button>

                                                    </form>

                                                </li>


                                                <!-- Cancel -->

                                                <li>

                                                    <form
                                                        action="<?= site_url(
                                                            'purchases/cancel/' .
                                                            $purchase['id']
                                                        ) ?>"
                                                        method="post">

                                                        <?= csrf_field() ?>

                                                        <button
                                                            type="submit"
                                                            class="dropdown-item text-danger"
                                                            onclick="return confirm('Cancel this purchase?')">

                                                            <i
                                                                class="bi bi-x-circle me-2">
                                                            </i>

                                                            Cancel Purchase

                                                        </button>

                                                    </form>

                                                </li>


                                            <?php endif; ?>


                                        </ul>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>


                    <?php else: ?>


                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5">

                                <i
                                    class="bi bi-cart-x display-5 text-muted">
                                </i>

                                <h5 class="mt-3">

                                    No purchases found

                                </h5>

                                <p class="text-muted">

                                    Start by creating your first purchase.

                                </p>

                                <a
                                    href="<?= site_url(
                                        'purchases/create'
                                    ) ?>"
                                    class="btn btn-primary">

                                    <i
                                        class="bi bi-plus-lg me-1">
                                    </i>

                                    New Purchase

                                </a>

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
     DATATABLES
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
            '#purchasesTable',
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
                    [0, 'desc']
                ],


                /*
                -----------------------------------------
                Actions column
                -----------------------------------------
                */

                columnDefs: [

                    {
                        targets: 6,
                        orderable: false,
                        searchable: false
                    }

                ],


                /*
                -----------------------------------------
                Language
                -----------------------------------------
                */

                language: {

                    search: "",

                    searchPlaceholder:
                        "Search purchases...",

                    lengthMenu:
                        "Show _MENU_ purchases",

                    info:
                        "Showing _START_ to _END_ of _TOTAL_ purchases",

                    infoEmpty:
                        "No purchases found",

                    zeroRecords:
                        "No matching purchases found",

                    emptyTable:
                        "No purchases available",

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