<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'DukaPro' ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="<?= base_url('assets/css/layout.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">
</head>
<!-- DataTables -->
<link
    rel="stylesheet"
    href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css"
>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.data-table').forEach(function (table) {

        new DataTable(table, {

            pageLength: 10,

            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All']
            ],

            ordering: true,

            searching: true,

            paging: true,

            info: true,

            language: {

                search: "Search:",

                searchPlaceholder: "Search records...",

                lengthMenu: "Show _MENU_ records",

                info: "Showing _START_ to _END_ of _TOTAL_ records",

                emptyTable: "No records found",

                zeroRecords: "No matching records found"

            }

        });

    });

});

</script>
<body>

    <?= $this->include('partials/sidebar') ?>

    <div class="app" id="app">

        <?= $this->include('partials/navbar') ?>

        <main class="content">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

    <script src="<?= base_url('assets/js/app.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>