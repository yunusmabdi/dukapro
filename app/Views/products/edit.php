<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit Product</h2>

<form action="<?= base_url('products/update/'.$product['id']) ?>" method="post">

    <?= $this->include('products/_form') ?>

</form>

<?= $this->endSection() ?>