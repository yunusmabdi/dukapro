document.addEventListener('click', function (e) {

    const button = e.target.closest('.add-to-cart');

    if (!button) return;

    const form = document.createElement('form');

    form.method = 'POST';
    form.action = window.BASE_URL + 'cart/add';

    const input = document.createElement('input');

    input.type = 'hidden';
    input.name = 'product_id';
    input.value = button.dataset.id;

    form.appendChild(input);

    document.body.appendChild(form);

    form.submit();

});

document.addEventListener("DOMContentLoaded", function () {


    // Category filtering

    const categoryButtons = document.querySelectorAll(".category-pill");
    const productItems = document.querySelectorAll(".product-item");


    categoryButtons.forEach(button => {


        button.addEventListener("click", function () {


            let selectedCategory = this.dataset.category;


            // Active button

            categoryButtons.forEach(btn => {
                btn.classList.remove("active");
            });


            this.classList.add("active");



            // Products

            productItems.forEach(product => {


                let productCategory = product.dataset.category;


                if (
                    selectedCategory === "all" ||
                    selectedCategory === productCategory
                ) {

                    product.style.display = "block";

                } else {

                    product.style.display = "none";

                }


            });


        });


    });

});

function updateCartCount()
{
    fetch('/pos/cart-count')
        .then(response => response.json())
        .then(data => {

            document.getElementById('cartCount').innerText =
                data.count;

        });
}