<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Category Details
            </h3>

            <p class="text-muted mb-0">
                View category information.
            </p>

        </div>

        <a href="<?= base_url('categories') ?>" class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <table class="table table-borderless">

                <tr>
                    <th width="220">Category Code</th>
                    <td><?= esc($category['category_code']) ?></td>
                </tr>

                <tr>
                    <th>Category Name</th>
                    <td><?= esc($category['name']) ?></td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td><?= esc($category['description']) ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <?php if ($category['status'] == 'Active') : ?>

                            <span class="badge bg-success">
                                Active
                            </span>

                        <?php else : ?>

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                        <?php endif; ?>

                    </td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td><?= esc($category['created_at']) ?></td>
                </tr>

                <tr>
                    <th>Updated At</th>
                    <td><?= esc($category['updated_at']) ?></td>
                </tr>

            </table>

        </div>

        <div class="card-footer bg-white">

            <a href="<?= base_url('categories/edit/' . $category['id']) ?>"
               class="btn btn-warning">

                <i class="bi bi-pencil-square me-2"></i>

                Edit

            </a>

            <a href="<?= base_url('categories') ?>"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>