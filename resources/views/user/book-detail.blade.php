<x-app-layout>
    @if(session()->has('cartMessage'))
    <script type="text/javascript">
        alert("{{ session()->get('cartMessage') }}");
    </script>
    @endif
    <div class="book_detail_content" style="margin: auto; width: 97%;">
        <div class="row">
            <div class="col-4 product_image_detail_slide">
                @include('user.product-image-detail-slide')
            </div>
            <div class="col-4">
                @include('user.book-detail-information')
            </div>
            <div class="col-4">
                @include('user.add-to-cart')
            </div>
        </div>
        @include('user.review-and-rating')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addToCartWrapper = document.querySelector('.add_to_cart_wrapper')

            document.querySelectorAll('.quantity_button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var inputField = this.parentNode.querySelector('.product_quantity');
                    var currentValue = parseInt(inputField.value);
                    if (this.name === 'action' && this.value === 'increase') {
                        inputField.value = currentValue + 1;
                    } else if (this.name === 'action' && this.value === 'decrease' && currentValue > 1) {
                        inputField.value = currentValue - 1;
                    }
                    updatePrice(addToCartWrapper);
                });
            });
            window.onload = updatePrice(addToCartWrapper);
        });

        function updatePrice(row) {
            var quantityInput = row.querySelector('.product_quantity');
            var priceContainer = document.getElementById('priceContainer');
            var pricePerUnit = Number(priceContainer.getAttribute('data-price'));
            var subtotal = quantityInput.value * pricePerUnit;
            var subtotalElement = row.querySelector('.temporary_product_price');
            subtotalElement.innerHTML = subtotal.toLocaleString();
        }
    </script>
</x-app-layout>