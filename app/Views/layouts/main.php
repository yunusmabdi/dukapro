<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'NexusERP' ?></title>

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