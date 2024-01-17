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