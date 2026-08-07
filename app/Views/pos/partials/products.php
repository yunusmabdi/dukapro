<div class="row g-4">

    <?php if (empty($products)): ?>

        <div class="col-12">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center py-5">

                    <i class="bi bi-box display-4 text-muted"></i>

                    <h4 class="fw-bold mt-3">
                        No Products Available
                    </h4>

                    <p class="text-muted mb-0">
                        Products you add in the ERP will appear here.
                    </p>

                </div>

            </div>

        </div>

    <?php else: ?>

        <?php foreach ($products as $product): ?>

            <?php

                $stock = (int) $product['stock'];

                if ($stock <= 0) {

                    $badgeClass = 'bg-danger';
                    $badgeText  = 'Out of Stock';
                    $buttonText = 'Out of Stock';
                    $disabled   = 'disabled';

                } elseif ($stock <= $product['min_stock']) {

                    $badgeClass = 'bg-warning text-dark';
                    $badgeText  = 'Low Stock';
                    $buttonText = 'Add to Cart';
                    $disabled   = '';

                } else {

                    $badgeClass = 'bg-success';
                    $badgeText  = 'In Stock';
                    $buttonText = 'Add to Cart';
                    $disabled   = '';

                }

            ?>

            <div
                class="col-12 col-sm-6 col-lg-4 mb-4 product-item"
                data-category="<?= $product['category_id'] ?>"
                data-name = "<?= strtolower($product['name']) ?>"
                data-sku = "<?= strtolower($product['sku']) ?>"
                data-barcode = "<?= strtolower($product['barcode'] ?? '') ?>">

                <div class="card border-0 shadow-sm rounded-4 h-100 product-card overflow-hidden">

                    <!-- Product Image -->
                    <div class="text-center pt-3 product-image">

                        <?php if (! empty($product['image'])): ?>

                            <img
                                src="<?= base_url('assets/images/products/' . $product['image']) ?>"
                                class="img-fluid"
                                alt="<?= esc($product['name']) ?>">

                        <?php else: ?>

                            <div
                                class="d-flex justify-content-center align-items-center bg-light rounded-3 mx-3"
                                style="height:180px;">

                                <i class="bi bi-box-seam display-3 text-secondary"></i>

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- Product Details -->
                    <div class="card-body d-flex flex-column">

                        <small class="text-muted">

                            <?= esc($product['category_name'] ?? 'Category') ?>

                        </small>

                        <h4 class="fw-bold mt-2 mb-2">

                            <?= esc($product['name']) ?>

                        </h4>

                        <small class="text-muted mb-2">

                            SKU: <?= esc($product['sku']) ?>

                        </small>

                        <h5 class="fw-bold text-primary mb-2">

                            KES <?= number_format($product['selling_price'], 2) ?>

                        </h5>

                        <small class="text-muted mb-3">

                            Stock: <?= $stock ?>

                        </small>

                        <span class="badge <?= $badgeClass ?> mb-3">

                            <?= $badgeText ?>

                        </span>

                        <button
                            type="button"
                            class="btn btn-danger w-100 add-to-cart"
                            data-id="<?= $product['id'] ?>"
                            <?= $disabled ?>>

                            <i class="bi bi-cart-plus me-2"></i>

                            <span><?= $buttonText ?></span>

                        </button>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>