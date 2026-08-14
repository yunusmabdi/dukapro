<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= $title ?? 'Sales History - DukaPro' ?></title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >


    <!-- Existing Layout Styles -->

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/layout.css') ?>"
    >

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/responsive.css') ?>"
    >

</head>


<body class="bg-light">


    <!-- =========================================
         SALES HISTORY HEADER
    ========================================== -->

    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">

        <div class="container-fluid px-4">


            <!-- BRAND -->

            <a
                href="<?= base_url('pos') ?>"
                class="navbar-brand d-flex align-items-center"
            >

                <div
                    class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-2"
                    style="width:40px;height:40px;"
                >

                    <i class="bi bi-grid-fill"></i>

                </div>

                <div>

                    <div class="fw-bold">
                        DukaPro
                    </div>

                    <small class="text-muted">
                        Sales History
                    </small>

                </div>

            </a>


            <!-- RIGHT SIDE -->

            <div class="d-flex align-items-center gap-3">


                <!-- USER -->

                <?php
                    $userName = session('user_name') ?? 'User';
                    $userRole = session('user_role') ?? 'Cashier';
                ?>

                <div class="d-flex align-items-center">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                        style="width:40px;height:40px;"
                    >

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <div class="ms-2">

                        <div class="fw-semibold">
                            <?= esc($userName) ?>
                        </div>

                        <small class="text-muted">
                            <?= esc($userRole) ?>
                        </small>

                    </div>

                </div>


                <!-- BACK TO POS -->

                <a
                    href="<?= base_url('pos') ?>"
                    class="btn btn-primary"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Back to POS

                </a>


                <!-- LOGOUT -->

                <a
                    href="<?= base_url('logout') ?>"
                    class="btn btn-outline-danger"
                >

                    <i class="bi bi-box-arrow-right me-1"></i>

                    Logout

                </a>

            </div>

        </div>

    </nav>


    <!-- =========================================
         PAGE CONTENT
    ========================================== -->

    <main class="container-fluid px-4 py-4">

        <?= $this->renderSection('content') ?>

    </main>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Existing App JS -->

    <script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>