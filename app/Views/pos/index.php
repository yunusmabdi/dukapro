<?= $this->extend('layouts/pos') ?>

<?= $this->section('content') ?>


<!-- =========================================
     POS TOPBAR
========================================== -->

<?= $this->include('pos/partials/topbar') ?>


<!-- =========================================
     POS PAGE
========================================== -->

<div class="container-fluid py-3 pos-page">


    <!-- =========================================
         CATEGORY FILTER
    ========================================== -->

    <section class="mb-3">

        <?= $this->include('pos/partials/categories') ?>

    </section>


    <!-- =========================================
         POS MAIN CONTENT
    ========================================== -->

    <div class="row g-4 pos-main-row">


        <!-- =====================================
             PRODUCTS
        ====================================== -->

        <div class="col-lg-8 products-column">

            <div
                class="card border-0 shadow-sm rounded-4 products-card"
            >

                <div class="card-body products-scroll">

                    <?= $this->include('pos/partials/products') ?>

                </div>

            </div>

        </div>


        <!-- =====================================
             CART + CHECKOUT
        ====================================== -->

        <div class="col-lg-4 cart-column">

            <div class="cart-checkout-scroll">


                <!-- =================================
                     SHOPPING CART
                ================================== -->

                <div id="cart-container">

                    <?= $this->include('pos/partials/cart') ?>

                </div>


                <!-- =================================
                     CHECKOUT
                ================================== -->

                <div
                    class="mt-3"
                    id="checkout-container"
                >

                    <?= $this->include('pos/partials/checkout') ?>

                </div>


            </div>

        </div>


    </div>

</div>


<!-- =========================================
     CUSTOMER SELECTION MODAL
========================================== -->

<?= $this->include('pos/partials/customer_modal') ?>


<!-- =========================================
     POS STYLES
========================================== -->

<style>

    /*
    =========================================
    POS PAGE
    =========================================
    */

    .pos-page {

        /*
         * Keep the POS inside the viewport.
         * The products and cart will scroll
         * independently.
         */

        height: calc(100vh - 125px);

        overflow: hidden;
    }


    /*
    =========================================
    POS MAIN ROW
    =========================================
    */

    .pos-main-row {

        height: calc(100% - 65px);

        min-height: 0;
    }


    /*
    =========================================
    PRODUCTS COLUMN
    =========================================
    */

    .products-column {

        height: 100%;

        min-height: 0;
    }


    /*
    =========================================
    PRODUCTS CARD
    =========================================
    */

    .products-card {

        height: 100%;

        min-height: 0;
    }


    /*
    =========================================
    PRODUCTS BODY
    =========================================
    */

    .products-card .card-body {

        height: 100%;

        min-height: 0;

        padding: 20px;
    }


    /*
    =========================================
    PRODUCT SCROLL
    =========================================
    */

    .products-scroll {

        overflow-y: auto;

        overflow-x: hidden;

        /*
         * Prevent the browser page from
         * scrolling when the mouse is over
         * the product section.
         */

        overscroll-behavior: contain;
    }


    /*
    =========================================
    CART COLUMN
    =========================================
    */

    .cart-column {

        height: 100%;

        min-height: 0;
    }


    /*
    =========================================
    CART + CHECKOUT SCROLL
    =========================================
    */

    .cart-checkout-scroll {

        height: 100%;

        overflow-y: auto;

        overflow-x: hidden;

        padding-right: 4px;

        /*
         * Prevent the scroll from propagating
         * to the main browser page.
         */

        overscroll-behavior: contain;
    }


    /*
    =========================================
    CUSTOM SCROLLBAR
    =========================================
    */

    .products-scroll::-webkit-scrollbar,
    .cart-checkout-scroll::-webkit-scrollbar {

        width: 7px;
    }


    .products-scroll::-webkit-scrollbar-track,
    .cart-checkout-scroll::-webkit-scrollbar-track {

        background: transparent;
    }


    .products-scroll::-webkit-scrollbar-thumb,
    .cart-checkout-scroll::-webkit-scrollbar-thumb {

        background: #cbd5e1;

        border-radius: 10px;
    }


    .products-scroll::-webkit-scrollbar-thumb:hover,
    .cart-checkout-scroll::-webkit-scrollbar-thumb:hover {

        background: #94a3b8;
    }


    /*
    =========================================
    MOBILE / TABLET
    =========================================
    */

    @media (max-width: 991.98px) {


        /*
        * Return to normal page scrolling
        * on smaller screens.
        */

        .pos-page {

            height: auto;

            overflow: visible;
        }


        .pos-main-row {

            height: auto;
        }


        .products-column,
        .cart-column {

            height: auto;
        }


        .products-card {

            height: auto;
        }


        .products-card .card-body {

            height: auto;
        }


        .products-scroll {

            height: auto;

            overflow: visible;

            overscroll-behavior: auto;
        }


        .cart-checkout-scroll {

            height: auto;

            overflow: visible;

            max-height: none;

            overscroll-behavior: auto;

            padding-right: 0;
        }

    }

</style>


<?= $this->endSection() ?>


<!-- =========================================
     POS JAVASCRIPT
========================================== -->

<script src="<?= base_url('assets/js/pos.js') ?>"></script>