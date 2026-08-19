<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Suppliers
            </h3>

            <p class="text-muted mb-0">
                Manage supplier records.
            </p>

        </div>

        <a
            href="<?= base_url('suppliers/create') ?>"
            class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Add Supplier

        </a>

    </div>


    <!-- Success Message -->
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


    <!-- Suppliers Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="suppliersTable"
                    class="table table-hover align-middle mb-0 data-table">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Code
                            </th>

                            <th>
                                Company
                            </th>

                            <th>
                                Contact Person
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Status
                            </th>

                            <th
                                class="text-center"
                                style="width:180px;">

                                Actions

                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($suppliers)): ?>

                            <?php foreach ($suppliers as $supplier): ?>

                                <tr>

                                    <!-- Code -->

                                    <td>

                                        <span class="fw-semibold text-primary">

                                            <?= esc(
                                                $supplier['supplier_code']
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- Company -->

                                    <td>

                                        <?= esc(
                                            $supplier['company_name']
                                        ) ?>

                                    </td>


                                    <!-- Contact -->

                                    <td>

                                        <?= esc(
                                            $supplier['contact_person']
                                        ) ?>

                                    </td>


                                    <!-- Email -->

                                    <td>

                                        <?= esc(
                                            $supplier['email']
                                        ) ?>

                                    </td>


                                    <!-- Phone -->

                                    <td>

                                        <?= esc(
                                            $supplier['phone']
                                        ) ?>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <?php if (
                                            $supplier['status']
                                            === 'Active'
                                        ): ?>

                                            <span class="badge bg-success">

                                                Active

                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-danger">

                                                Inactive

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Actions -->

                                    <td class="text-center">

                                        <a
                                            href="<?= base_url(
                                                'suppliers/show/' .
                                                $supplier['id']
                                            ) ?>"
                                            class="btn btn-info btn-sm text-white"
                                            title="View">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        <a
                                            href="<?= base_url(
                                                'suppliers/edit/' .
                                                $supplier['id']
                                            ) ?>"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <a
                                            href="<?= base_url(
                                                'suppliers/delete/' .
                                                $supplier['id']
                                            ) ?>"
                                            class="btn btn-danger btn-sm"
                                            title="Delete"
                                            onclick="return confirm('Delete this supplier?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5">

                                    <i
                                        class="bi bi-truck fs-1 text-muted d-block mb-3">
                                    </i>

                                    <h5>
                                        No Suppliers Found
                                    </h5>

                                    <p class="text-muted mb-3">

                                        Add your first supplier
                                        to get started.

                                    </p>

                                    <a
                                        href="<?= base_url(
                                            'suppliers/create'
                                        ) ?>"
                                        class="btn btn-primary">

                                        <i
                                            class="bi bi-plus-circle me-2">
                                        </i>

                                        Add Supplier

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
            '#suppliersTable',
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
                Search / Pagination Text
                -----------------------------------------
                */

                language: {

                    search: "",

                    searchPlaceholder:
                        "Search suppliers...",

                    lengthMenu:
                        "Show _MENU_ suppliers",

                    info:
                        "Showing _START_ to _END_ of _TOTAL_ suppliers",

                    infoEmpty:
                        "No suppliers found",

                    zeroRecords:
                        "No matching suppliers found",

                    emptyTable:
                        "No suppliers available",

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