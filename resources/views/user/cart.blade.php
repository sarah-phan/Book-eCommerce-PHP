<x-app-layout>
    <div class="cart_wrapper" style="margin: auto; width: 97%;">
        <h4 class="cart_title">Shopping cart</h4>
        <p class="cart_subtitle">There are {{$totalProduct}} items in your cart</p>
        <div class="row no-gutters">
            <div class="col-8">
                @include('user/cart-detail')
            </div>
            <div class="col-4">
                @include('user/shipping-payment-detail')
            </div>
        </div>
    </div>
    <script>
        function updatePriceForCartDetail(row) {
            console.log(row);
            var quantityInputs = row.querySelectorAll('.product_quantity');
            var total = 0;

            quantityInputs.forEach(function(quantityInput, index) {
                var unitPriceElement = row.querySelectorAll('.cart_detail_unit_price')[index];
                var pricePerUnit = parseFloat(unitPriceElement.textContent.replace(/,/g, '')); // Remove commas and convert to number

                var subtotal = quantityInput.value * pricePerUnit;
                var subtotalElement = row.querySelectorAll('.temporary_product_price')[index];
                subtotalElement.innerHTML = subtotal.toLocaleString();

                total += subtotal;
                var totalElement = row.querySelector('.total_product_price');
                console.log(totalElement);
                if (totalElement != null) {
                    totalElement.innerHTML = total.toLocaleString();
                }
            });
        }
    </script>
</x-app-layout>