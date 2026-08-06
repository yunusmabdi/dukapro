<?= $this->extend('layouts/pos') ?>

<?= $this->section('content') ?>

<?= $this->include('pos/partials/topbar') ?>


<div class="container-fluid py-3">


    <!-- Category Filter -->
    <section class="mb-4">

        <?= $this->include('pos/partials/categories') ?>

    </section>



    <!-- POS Main Area -->
    <div class="row g-4">


        <!-- Product Area -->
        <div class="col-lg-8">


            <div class="card border-0 shadow-sm rounded-4">


                <div class="card-body">


                    <?= $this->include('pos/partials/products') ?>


                </div>


            </div>


        </div>




        <!-- Cart & Checkout Area -->
        <div class="col-lg-4">


            <div class="sticky-lg-top" style="top:20px;">


                <?= $this->include('pos/partials/cart') ?>



                <div class="mt-3">


                    <?= $this->include('pos/partials/checkout') ?>


                </div>


            </div>


        </div>


    </div>


</div>




<!-- Customer Selection Modal -->
<?= $this->include('pos/partials/customer_modal') ?>



<!-- POS Scripts -->
<?= $this->section('scripts') ?>

<script>

document.querySelectorAll('.add-to-cart')
.forEach(button => {


    button.addEventListener('click', function(){


        let productId = this.dataset.id;


        fetch("<?= base_url('cart/add') ?>", {

            method: "POST",

            headers: {

                "Content-Type": "application/x-www-form-urlencoded",

                "X-Requested-With": "XMLHttpRequest"

            },

            body: "product_id=" + productId


        })

        .then(response => response.json())

        .then(data => {


            if(data.status){


                alert(data.message);


            } else {


                alert(data.message);


            }


        });


    });


});


</script>


<?= $this->endSection() ?>


<?= $this->endSection() ?>