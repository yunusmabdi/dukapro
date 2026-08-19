<?php

$userName = session('user_name') ?? 'User';
$userRole = session('user_role') ?? 'Cashier';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>DukaPro - Sales History</title>

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

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            color: #172033;
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;
        }

        .history-wrapper {
            min-height: 100vh;
            padding: 28px;
        }

        .history-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* =========================================
           TOP BAR
        ========================================== */

        .history-topbar {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 18px;
            padding: 18px 22px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: #2563eb;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 13px;
            margin-top: 3px;
        }

        /* =========================================
           USER
        ========================================== */

        .user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
        }

        .user-role {
            color: #64748b;
            font-size: 11px;
        }

        /* =========================================
           SUMMARY
        ========================================== */

        .summary-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            padding: 18px 20px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
        }

        .summary-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .summary-value {
            font-size: 22px;
            font-weight: 700;
        }

        /* =========================================
           MAIN CARD
        ========================================== */

        .history-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
        }

        .history-card-header {
            padding: 20px;
            border-bottom: 1px solid #eef2f7;
        }

        .history-card-title {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .history-card-subtitle {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        /* =========================================
           TABLE
        ========================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .sales-table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        .sales-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .03em;
            padding: 14px 16px;
            border-bottom: 1px solid #eef2f7;
            white-space: nowrap;
        }

        .sales-table td {
            padding: 15px 16px;
            font-size: 13px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .sales-table tbody tr:hover {
            background: #fafcff;
        }

        .sales-table tbody tr:last-child td {
            border-bottom: none;
        }

        .invoice-number {
            font-weight: 700;
            color: #2563eb;
        }

        .cashier-name {
            font-weight: 500;
        }

        .date-text {
            color: #475569;
        }

        .payment-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 11px;
            font-weight: 600;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #16a34a;
            font-size: 11px;
            font-weight: 600;
        }

        .total-value {
            font-weight: 700;
        }

        /* =========================================
           EMPTY STATE
        ========================================== */

        .empty-state {
            padding: 70px 20px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 27px;
        }

        .empty-title {
            font-weight: 700;
            color: #334155;
            margin-bottom: 5px;
        }

        .empty-description {
            font-size: 13px;
        }

        /* =========================================
           RESPONSIVE
        ========================================== */

        @media (max-width: 768px) {

            .history-wrapper {
                padding: 16px;
            }

            .history-topbar {
                padding: 16px;
            }

            .page-title {
                font-size: 20px;
            }

        }

    </style>

</head>

<body>

<div class="history-wrapper">

    <div class="history-container">


        <!-- =========================================
             HEADER
        ========================================== -->

        <div class="history-topbar">

            <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">

                <div class="d-flex align-items-center">

                    <div class="brand-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                    <div class="ms-3">

                        <h1 class="page-title">
                            Sales History
                        </h1>

                        <div class="page-subtitle">
                            View completed sales and transaction records
                        </div>

                    </div>

                </div>


                <!-- USER -->

                <div class="user-badge">

                    <div class="user-avatar">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <div>

                        <div class="user-name">
                            <?= esc($userName) ?>
                        </div>

                        <div class="user-role">
                            <?= esc($userRole) ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================================
             SUMMARY
        ========================================== -->

        <?php

        $saleCount = count($sales);

        $totalRevenue = 0;

        foreach ($sales as $sale) {

            $totalRevenue += (float) ($sale['total'] ?? 0);

        }

        ?>

        <div class="row g-3 mb-4">

            <div class="col-md-6">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Transactions
                    </div>

                    <div class="summary-value">
                        <?= number_format($saleCount) ?>
                    </div>

                </div>

            </div>


            <div class="col-md-6">

                <div class="summary-card">

                    <div class="summary-label">
                        Total Revenue
                    </div>

                    <div class="summary-value">
                        KES <?= number_format($totalRevenue, 2) ?>
                    </div>

                </div>

            </div>

        </div>


        <!-- =========================================
             SALES TABLE
        ========================================== -->

        <div class="history-card">


            <div class="history-card-header">

                <h2 class="history-card-title">
                    Completed Sales
                </h2>

                <div class="history-card-subtitle">
                    All recorded sales transactions
                </div>

            </div>


            <?php if (!empty($sales)): ?>

                <div class="table-wrapper">

                    <table class="sales-table">

                        <thead>

                            <tr>

                                <th>
                                    Invoice
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Cashier
                                </th>

                                <th>
                                    Payment
                                </th>

                                <th class="text-end">
                                    Amount Paid
                                </th>

                                <th class="text-end">
                                    Change
                                </th>

                                <th class="text-end">
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                                <th class="text-end">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php foreach ($sales as $sale): ?>

                            <tr>

                                <!-- Invoice -->

                                <td>

                                    <div class="invoice-number">

                                        <?= esc(
                                            $sale['invoice_number'] ?? 'N/A'
                                        ) ?>

                                    </div>

                                </td>


                                <!-- Date -->

                                <td>

                                    <div class="date-text">

                                        <?php if (!empty($sale['sale_date'])): ?>

                                            <?= date(
                                                'd M Y, H:i',
                                                strtotime($sale['sale_date'])
                                            ) ?>

                                        <?php else: ?>

                                            —

                                        <?php endif; ?>

                                    </div>

                                </td>


                                <!-- Cashier -->

                                <td>

                                    <div class="cashier-name">

                                        <?= esc(
                                            $sale['cashier_name'] ?? 'Unknown'
                                        ) ?>

                                    </div>

                                </td>


                                <!-- Payment -->

                                <td>

                                    <span class="payment-badge">

                                        <?php

                                        $method =
                                            $sale['payment_method']
                                            ?? 'Unknown';

                                        ?>

                                        <?php if ($method === 'Cash'): ?>

                                            <i class="bi bi-cash-stack"></i>

                                        <?php elseif ($method === 'M-Pesa'): ?>

                                            <i class="bi bi-phone"></i>

                                        <?php elseif ($method === 'Card'): ?>

                                            <i class="bi bi-credit-card"></i>

                                        <?php else: ?>

                                            <i class="bi bi-wallet2"></i>

                                        <?php endif; ?>

                                        <?= esc($method) ?>

                                    </span>

                                </td>


                                <!-- Amount Paid -->

                                <td class="text-end">

                                    KES
                                    <?= number_format(
                                        (float) ($sale['amount_paid'] ?? 0),
                                        2
                                    ) ?>

                                </td>


                                <!-- Change -->

                                <td class="text-end">

                                    KES
                                    <?= number_format(
                                        (float) ($sale['change_amount'] ?? 0),
                                        2
                                    ) ?>

                                </td>


                                <!-- Total -->

                                <td class="text-end">

                                    <span class="total-value">

                                        KES
                                        <?= number_format(
                                            (float) ($sale['total'] ?? 0),
                                            2
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Status -->

                                <td>

                                    <?php

                                    $status =
                                        $sale['status']
                                        ?? 'Completed';

                                    ?>

                                    <?php if ($status === 'Completed'): ?>

                                        <span class="status-badge">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Completed

                                        </span>

                                    <?php else: ?>

                                        <span class="badge text-bg-secondary">

                                            <?= esc($status) ?>

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- Action -->

                                <td class="text-end">

                                    <a
                                        href="<?= base_url(
                                            'invoices/' . $sale['id']
                                        ) ?>"
                                        class="btn btn-sm btn-outline-primary"
                                    >

                                        <i class="bi bi-eye me-1"></i>

                                        Receipt

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>


            <?php else: ?>


                <!-- EMPTY -->

                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                    <div class="empty-title">

                        No Sales Yet

                    </div>

                    <div class="empty-description">

                        Completed sales will appear here.

                    </div>

                </div>

            <?php endif; ?>


        </div>


        <!-- =========================================
             NAVIGATION
        ========================================== -->

        <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">

            <a
                href="<?= base_url('pos') ?>"
                class="btn btn-primary"
            >

                <i class="bi bi-cart3 me-2"></i>

                Back to POS

            </a>


            <?php if ($userRole === 'Administrator'): ?>

                <a
                    href="<?= base_url('dashboard') ?>"
                    class="btn btn-outline-secondary"
                >

                    <i class="bi bi-speedometer2 me-2"></i>

                    Admin Dashboard

                </a>

            <?php endif; ?>

        </div>


    </div>

</div>

</body>

</html>