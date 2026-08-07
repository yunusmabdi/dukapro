<?php

$cart = session()->get('cart') ?? [];

$count = 0;
$subtotal = 0;

foreach ($cart as $item) {

    $count += $item['quantity'];
    $subtotal += $item['price'] * $item['quantity'];

}

?>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">
                    Shopping Cart
                </h5>

                <small class="text-muted">

                    <?= $count ?> Item<?= $count == 1 ? '' : 's' ?>

                </small>

            </div>

            <form action="<?= base_url('cart/clear') ?>" method="post">

                <button class="btn btn-outline-danger btn-sm">

                    <i class="bi bi-trash"></i>

                </button>

            </form>

        </div>

    </div>

    <div class="card-body">

        <?php if (empty($cart)): ?>

            <div class="text-center py-5">

                <i class="bi bi-cart-x display-4 text-secondary"></i>

                <p class="text-muted mt-3">

                    Cart is Empty

                </p>

            </div>

        <?php else: ?>

            <?php foreach ($cart as $item): ?>

                <?php $lineTotal = $item['price'] * $item['quantity']; ?>

                <div class="border-bottom py-3">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-semibold mb-1">

                                <?= esc($item['name']) ?>

                            </h6>

                            <small class="text-muted">

                                KES <?= number_format($item['price'],2) ?>

                            </small>

                        </div>

                        <form action="<?= base_url('cart/remove') ?>" method="post">

                            <input
                                type="hidden"
                                name="product_id"
                                value="<?= $item['product_id'] ?>">

                            <button class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-x-lg"></i>

                            </button>

                        </form>

                    </div>

                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-primary">

                            x<?= $item['quantity'] ?>

                        </span>

                        <strong>

                            KES <?= number_format($lineTotal,2) ?>

                        </strong>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <div class="card-footer bg-white">

        <div class="d-flex justify-content-between">

            <span>Items</span>

            <strong><?= $count ?></strong>

        </div>

        <hr>

        <div class="d-flex justify-content-between">

            <h5>Total</h5>

            <h5 class="text-primary">

                KES <?= number_format($subtotal,2) ?>

            </h5>

        </div>

    </div>

</div>