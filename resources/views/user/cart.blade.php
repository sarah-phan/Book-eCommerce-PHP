<x-app-layout>
    <div class="cart_wrapper" style="margin: auto; width: 97%;">
        @error('shipping_information_id')
        <div class="show_cart_error_message">{{ $message }}</div>
        @enderror
        @error('paymentMethod')
        <div class="show_cart_error_message">{{ $message }}</div>
        @enderror
        <h4 class="cart_title">Shopping cart</h4>
        <p class="cart_subtitle">There are {{$totalProduct}} items in your cart</p>
        <form action="/order" method="POST">
            <div class="row no-gutters">
                <div class="col-8">
                    @include('user/cart-detail')
                </div>
                <div class="col-4">
                    @include('user/shipping-payment-detail')
                </div>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('.quantity_button').forEach(button => {
            var cartWrapper = document.querySelector('.cart_wrapper')

            button.addEventListener('click', function(e) {
                e.preventDefault();
                var inputField = this.parentNode.querySelector('.product_quantity');
                var currentValue = parseInt(inputField.value);
                if (this.name === 'action' && this.value === 'increase') {
                    inputField.value = currentValue + 1;
                } else if (this.name === 'action' && this.value === 'decrease' && currentValue > 1) {
                    inputField.value = currentValue - 1;
                }
                updatePriceForCartDetail(cartWrapper)
                this.form.submit();
            });
            window.onload = updatePriceForCartDetail(cartWrapper);

        });

        function updatePriceForCartDetail(row) {
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
                if (totalElement != null) {
                    totalElement.innerHTML = total.toLocaleString();
                    document.getElementById('total').value = total;
                }
            });
        }
    </script>
</x-app-layout>