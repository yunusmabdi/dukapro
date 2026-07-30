<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Add Product</h2>

<form action="<?= base_url('products/store') ?>" method="post">

    <?= $this->include('products/_form') ?>

</form>

<?= $this->endSection() ?>