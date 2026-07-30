<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3 class="fw-bold mb-4">

    Dashboard

</h3>

<div class="row g-4">

    <div class="col-md-3">

        <div class="dashboard-card">

            <h6>Total Sales</h6>

            <h2>KES 245,000</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="dashboard-card">

            <h6>Products</h6>

            <h2>1,250</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="dashboard-card">

            <h6>Customers</h6>

            <h2>520</h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="dashboard-card">

            <h6>Low Stock</h6>

            <h2>18</h2>

        </div>

    </div>

</div>

<?= $this->endSection() ?>