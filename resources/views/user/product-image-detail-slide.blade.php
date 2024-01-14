<div class="product_image_detail_slide_wrapper">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php
            $imageUrl = Illuminate\Support\Facades\Storage::url($bookData->book_image_path);
            ?>
            <div class="swiper-slide">
                <img src="{{$imageUrl}}" />
            </div>
        </div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $imageUrl = Illuminate\Support\Facades\Storage::url($bookData->book_image_path);
            ?>
            <div class="swiper-slide">
                <img src="{{$imageUrl}}" />
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="swiper-pagination"></div>
</div>