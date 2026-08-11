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

// Product Search
document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById('productSearch');


    if(searchInput)
    {

        searchInput.addEventListener('keyup', function () {


            let keyword = this.value.toLowerCase().trim();


            let products = document.querySelectorAll('.product-item');


            products.forEach(function(product){


                let name =
                    product.dataset.name ?? '';

                let sku =
                    product.dataset.sku ?? '';

                let barcode =
                    product.dataset.barcode ?? '';



                if(
                    name.includes(keyword) ||
                    sku.includes(keyword) ||
                    barcode.includes(keyword)
                )
                {

                    product.style.display = '';

                }
                else
                {

                    product.style.display = 'none';

                }


            });


        });


    }


});
// =====================================
// Checkout
// =====================================

document.addEventListener("DOMContentLoaded", function () {

    const checkoutForm = document.getElementById("checkoutForm");

    if (!checkoutForm) {
        return;
    }


    const paymentMethod =
        document.getElementById("paymentMethod");

    const amountPaid =
        document.getElementById("amountPaid");

    const amountLabel =
        document.getElementById("amountLabel");

    const paymentReferenceGroup =
        document.getElementById("paymentReferenceGroup");

    const paymentReference =
        document.getElementById("paymentReference");

    const checkoutTotal =
        document.getElementById("checkoutTotal");

    const checkoutChange =
        document.getElementById("checkoutChange");

    const completeSaleButton =
        document.getElementById("completeSaleButton");

    const checkoutError =
        document.getElementById("checkoutError");

    const amountError =
        document.getElementById("amountError");

    const referenceError =
        document.getElementById("referenceError");


    const total =
        parseFloat(checkoutTotal.dataset.total || 0);


    function formatCurrency(amount)
    {
        return "KES " + amount.toFixed(2);
    }


    function updatePaymentFields()
    {
        const method = paymentMethod.value;

        amountPaid.value = "";
        amountPaid.classList.remove("is-invalid");

        paymentReference.value = "";
        paymentReference.classList.remove("is-invalid");

        checkoutError.classList.add("d-none");
        checkoutError.textContent = "";

        checkoutChange.textContent = "KES 0.00";


        if (method === "Cash")
        {
            amountLabel.textContent = "Amount Received";

            paymentReferenceGroup.classList.add("d-none");

            paymentReference.removeAttribute("required");

            amountPaid.setAttribute("placeholder", "0.00");
        }


        if (method === "M-Pesa")
        {
            amountLabel.textContent = "M-Pesa Amount";

            paymentReferenceGroup.classList.remove("d-none");

            paymentReference.setAttribute("required", "required");

            paymentReference.setAttribute(
                "placeholder",
                "e.g. QWE123456789"
            );

            amountPaid.setAttribute("placeholder", "0.00");
        }


        if (method === "Card")
        {
            amountLabel.textContent = "Card Payment Amount";

            paymentReferenceGroup.classList.remove("d-none");

            paymentReference.setAttribute("required", "required");

            paymentReference.setAttribute(
                "placeholder",
                "Enter transaction/reference number"
            );

            amountPaid.setAttribute("placeholder", "0.00");
        }
    }


    function updateChange()
    {
        const method = paymentMethod.value;

        const amount =
            parseFloat(amountPaid.value) || 0;


        if (method === "Cash")
        {
            if (amount >= total)
            {
                const change = amount - total;

                checkoutChange.textContent =
                    formatCurrency(change);

                amountPaid.classList.remove("is-invalid");
            }
            else
            {
                checkoutChange.textContent =
                    "KES 0.00";
            }
        }
        else
        {
            checkoutChange.textContent =
                "KES 0.00";
        }
    }


    paymentMethod.addEventListener(
        "change",
        function ()
        {
            updatePaymentFields();
        }
    );


    amountPaid.addEventListener(
        "input",
        function ()
        {
            updateChange();

            amountPaid.classList.remove("is-invalid");

            checkoutError.classList.add("d-none");
        }
    );


    paymentReference.addEventListener(
        "input",
        function ()
        {
            paymentReference.classList.remove("is-invalid");

            checkoutError.classList.add("d-none");
        }
    );


    checkoutForm.addEventListener(
        "submit",
        function (e)
        {
            const method =
                paymentMethod.value;

            const amount =
                parseFloat(amountPaid.value) || 0;

            const reference =
                paymentReference.value.trim();


            let valid = true;


            amountPaid.classList.remove("is-invalid");

            paymentReference.classList.remove("is-invalid");

            checkoutError.classList.add("d-none");

            checkoutError.textContent = "";


            // Amount validation
            if (amount <= 0)
            {
                amountPaid.classList.add("is-invalid");

                checkoutError.textContent =
                    "Please enter the payment amount.";

                checkoutError.classList.remove("d-none");

                valid = false;
            }


            // Cash validation
            if (
                method === "Cash" &&
                amount < total
            )
            {
                amountPaid.classList.add("is-invalid");

                amountError.textContent =
                    "Amount received cannot be less than the total.";

                checkoutError.textContent =
                    "The amount received is less than the sale total.";

                checkoutError.classList.remove("d-none");

                valid = false;
            }


            // M-Pesa/Card reference validation
            if (
                (method === "M-Pesa" || method === "Card") &&
                reference === ""
            )
            {
                paymentReference.classList.add("is-invalid");

                checkoutError.textContent =
                    "Transaction/reference number is required.";

                checkoutError.classList.remove("d-none");

                valid = false;
            }


            if (!valid)
            {
                e.preventDefault();

                return;
            }


            completeSaleButton.disabled = true;

            completeSaleButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Processing...';
        }
    );


    // Initial state
    updatePaymentFields();

    updateChange();

});