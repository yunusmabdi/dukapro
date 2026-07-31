<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Suppliers
            </h3>

            <p class="text-muted mb-0">
                Manage supplier records.
            </p>

        </div>

        <a href="<?= base_url('suppliers/create') ?>" class="btn btn-primary">

            <i class="bi bi-plus-circle me-2"></i>

            Add Supplier

        </a>

    </div>

    <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= session()->getFlashdata('success') ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    <?php endif; ?>

    <div class="card border-0 shadow-sm">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Code</th>
                        <th>Company</th>
                        <th>Contact Person</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center" width="180">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($suppliers)): ?>

                        <?php foreach($suppliers as $supplier): ?>

                            <tr>

                                <td>

                                    <span class="fw-semibold text-primary">

                                        <?= esc($supplier['supplier_code']) ?>

                                    </span>

                                </td>

                                <td><?= esc($supplier['company_name']) ?></td>

                                <td><?= esc($supplier['contact_person']) ?></td>

                                <td><?= esc($supplier['email']) ?></td>

                                <td><?= esc($supplier['phone']) ?></td>

                                <td>

                                    <?php if($supplier['status']=='Active'): ?>

                                        <span class="badge bg-success">

                                            Active

                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td class="text-center">

                                    <a href="<?= base_url('suppliers/show/'.$supplier['id']) ?>" class="btn btn-info btn-sm text-white">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a href="<?= base_url('suppliers/edit/'.$supplier['id']) ?>" class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <a href="<?= base_url('suppliers/delete/'.$supplier['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this supplier?')">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <i class="bi bi-truck fs-1 text-muted d-block mb-3"></i>

                                <h5>No Suppliers Found</h5>

                                <p class="text-muted">

                                    Add your first supplier to get started.

                                </p>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>