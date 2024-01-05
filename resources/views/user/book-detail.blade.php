<x-app-layout>
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
</x-app-layout>