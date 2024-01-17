<div class="item_list">
    <div class="row">
        @foreach($bookData as $data)
        <div class="col-3">
            <a class="card" style="width: 14rem;" href="/book-detail/{{$data->book_id}}">
                <?php
                $imageUrl = Illuminate\Support\Facades\Storage::url($data->book_image_path);
                ?>
                <img src="{{$imageUrl}}" class="card-img-top">
                <div class="card-body">
                    <p class="card-text book_name">{{$data->title}}</p>
                    <span class="card-text rating">
                        <x-show-all-star :rating_number=4 />
                    </span>
                    <span class="quantity_remaining">
                        Only {{$data->inventory_quantity}} left
                    </span>
                    <p class="card-title book_price" id="book_price_id">
                        {{number_format($data->price, 0, '', ',')}}
                    </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>