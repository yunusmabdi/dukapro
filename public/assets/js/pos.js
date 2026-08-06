document.addEventListener('DOMContentLoaded', function () {


    document.querySelectorAll('.add-to-cart').forEach(button => {


        button.addEventListener('click', function () {


            let productId = this.dataset.id;


            fetch(window.BASE_URL + 'cart/add', {


                method: 'POST',


                headers: {

                    'Content-Type': 'application/x-www-form-urlencoded',

                    'X-Requested-With': 'XMLHttpRequest'

                },


                body: 'product_id=' + productId


            })


            .then(response => response.json())


            .then(data => {


                console.log(data);


                if(data.status){

                    alert(data.message);

                } else {

                    alert(data.message);

                }


            })


            .catch(error => {

                console.error(error);

            });


        });


    });


});