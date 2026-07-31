<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Add Category
            </h3>

            <p class="text-muted">
                Create a new product category.
            </p>

        </div>

    </div>

    <?= view('categories/_form', [

        'action' => base_url('categories/store'),

        'categoryCode' => $categoryCode,

    ]) ?>

</div>

<?= $this->endSection() ?>