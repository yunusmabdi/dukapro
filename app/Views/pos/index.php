<?= $this->extend('layouts/pos') ?>

<?= $this->section('content') ?>

<?= $this->include('pos/partials/topbar') ?>


<div class="container-fluid py-3">


    <!-- Category Filter -->
    <section class="mb-4">

        <?= $this->include('pos/partials/categories') ?>

    </section>


    <!-- POS Main Content -->
    <div class="row g-4">


        <!-- Products -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <?= $this->include('pos/partials/products') ?>

                </div>

            </div>

        </div>


        <!-- Cart & Checkout -->
        <div class="col-lg-4">

            <div class="sticky-lg-top" style="top:20px;">

                <!-- Shopping Cart -->
                <div id="cart-container">

                    <?= $this->include('pos/partials/cart') ?>

                </div>

                <!-- Checkout -->
                <div class="mt-3" id="checkout-container">

                    <?= $this->include('pos/partials/checkout') ?>

                </div>

            </div>

        </div>


    </div>


</div>




<!-- Customer Selection Modal -->
<?= $this->include('pos/partials/customer_modal') ?>
<?= $this->endSection() ?>


<script src="<?= base_url('assets/js/POS.js') ?>"></script>