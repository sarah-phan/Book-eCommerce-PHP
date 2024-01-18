<div class="cart_header_wrapper">
    <div class="row">
        <div class="col-5">
            <p>Book name</p>
        </div>
        <div class="col-2">
            <p>Unit price</p>
        </div>
        <div class="col-2">
            <p>Quantity</p>
        </div>
        <div class="col-2">
            <p>Subtotal</p>
        </div>
        <div class="col-1">
            <img src="{{asset('image/icon/Trash.svg')}}" alt="Trash Icon" />
        </div>
    </div>
</div>
<div class="cart_body_wrapper">
    @forEach($bookData as $data)
    <?php
    $imageUrl = \Illuminate\Support\Facades\Storage::url($data[0]);
    ?>
    <div class="row">
        <div class="col-5">
            <a class="cart_book_detail" href="">
                <img src="{{$imageUrl}}" class="card-img-top">
                <p>{{$data[1]}}</p>
            </a>
        </div>
        <div class="col-2 cart_detail_unit_price">
            <p>
                {{number_format($data[2], 0, '', ',')}}
            </p>
        </div>
        <div class="col-2">
            <form method="POST" action="/cart/update-cart/{{$data[4]}}/{{$data[5]}}">
                @csrf
                <div class="cart_group_input">
                    <button type="submit" name="action" value="decrease" class="quantity_button">
                        <img src="{{asset('image/icon/Decrease.svg')}}" alt="Decrease Icon" />
                    </button>
                    <input type="number" class="product_quantity" value="{{$data[3]}}" name="product_quantity_input">
                    <button type="submit" name="action" value="increase" class="quantity_button">
                        <img src="{{asset('image/icon/Increase.svg')}}" alt="Increase Icon" />
                    </button>
                </div>
            </form>
        </div>
        <div class="col-2">
            <p class="temporary_product_price"></p>
        </div>
        <div class="col-1">
            <a href="/cart/delete-cart-item/{{$data[4]}}/{{$data[5]}}">
                <img src="{{asset('image/icon/Trash.svg')}}" alt="Trash Icon" />
            </a>
        </div>
    </div>
    <hr />
    @endforeach
</div>