<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Categories</h3>
            <p class="text-muted mb-0">
                Manage product categories
            </p>
        </div>

        <a href="<?= base_url('categories/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Add Category
        </a>

    </div>

    <!-- Success Message -->
    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <?= session()->getFlashdata('success') ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    <?php endif; ?>

    <!-- Categories Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle data-table">

                    <thead class="table-light">

                        <tr>

                            <th width="60">#</th>

                            <th>Category Code</th>

                            <th>Category Name</th>

                            <th>Description</th>

                            <th>Status</th>

                            <th width="180" class="text-center">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($categories)) : ?>

                            <?php foreach ($categories as $category) : ?>

                                <tr>

                                    <td><?= $category['id'] ?></td>

                                    <td>

                                        <span class="fw-semibold text-primary">

                                            <?= esc($category['category_code']) ?>

                                        </span>

                                    </td>

                                    <td>

                                        <?= esc($category['name']) ?>

                                    </td>

                                    <td>

                                        <?= esc($category['description']) ?>

                                    </td>

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

                                    <td class="text-center">

                                        <a href="<?= base_url('categories/show/' . $category['id']) ?>"
                                           class="btn btn-sm btn-info text-white"
                                           title="View">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <a href="<?= base_url('categories/edit/' . $category['id']) ?>"
                                           class="btn btn-sm btn-warning"
                                           title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <a href="<?= base_url('categories/delete/' . $category['id']) ?>"
                                           class="btn btn-sm btn-danger"
                                           title="Delete"
                                           onclick="return confirm('Are you sure you want to delete this category?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-folder2-open fs-1 text-muted d-block mb-3"></i>

                                    <h5>No Categories Found</h5>

                                    <p class="text-muted mb-3">
                                        Start by creating your first category.
                                    </p>

                                    <a href="<?= base_url('categories/create') ?>"
                                       class="btn btn-primary">

                                        <i class="bi bi-plus-circle me-2"></i>

                                        Add Category

                                    </a>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>