<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="<?= $action ?>" method="post">

            <?= csrf_field(); ?>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Category Code
                    </label>

                    <input
                        type="text"
                        class="form-control bg-light"
                        value="<?= esc($category['category_code'] ?? $categoryCode) ?>"
                        readonly
                    >

                    <small class="text-muted">
                        Generated automatically by the system.
                    </small>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option value="Active"
                            <?= old('status', $category['status'] ?? 'Active') == 'Active' ? 'selected' : '' ?>>
                            Active
                        </option>

                        <option value="Inactive"
                            <?= old('status', $category['status'] ?? '') == 'Inactive' ? 'selected' : '' ?>>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="e.g Electronics"
                    value="<?= old('name', $category['name'] ?? '') ?>"
                    required
                >

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control"
                    placeholder="Enter category description..."
                ><?= old('description', $category['description'] ?? '') ?></textarea>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="<?= base_url('categories') ?>" class="btn btn-light">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-check-circle me-2"></i>

                    <?= isset($category) ? 'Update Category' : 'Save Category' ?>

                </button>

            </div>

        </form>

    </div>

</div>