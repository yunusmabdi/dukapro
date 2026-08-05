<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="pos-wrapper">

    <?= $this->include('pos/partials/topbar') ?>

    <div class="container-fluid mt-3">

        <div class="row">

            <div class="col-lg-2 mb-3">
                <?= $this->include('pos/partials/sidebar') ?>
            </div>

            <div class="col-lg-7 mb-3">
                <?= $this->include('pos/partials/products') ?>
            </div>

            <div class="col-lg-3">
                <?= $this->include('pos/partials/cart') ?>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>