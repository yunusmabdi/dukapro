<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Category
            </h3>

            <p class="text-muted mb-0">
                Update category information.
            </p>

        </div>

        <a href="<?= base_url('categories') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <?= view('categories/_form', [

        'action' => base_url('categories/update/' . $category['id']),

        'category' => $category,

        'categoryCode' => $category['category_code']

    ]) ?>

</div>

<?= $this->endSection() ?>