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
            <x-trash-icon />
        </div>
    </div>
</div>
<div class="cart_body_wrapper">
    <div class="row">
        <div class="col-5">
            <a class="cart_book_detail" href="">
                <img src="https://salt.tikicdn.com/cache/280x280/ts/product/3e/b8/7b/d4ac28e5e26e50815b96547fd4f868b6.jpg.webp" class="card-img-top" alt="englishGrammarInUse">
                <p>First book</p>
            </a>
        </div>
        <div class="col-2">
            <p>
                {{$unit_price}}
                <sup>₫</sup>
            </p>
        </div>
        <div class="col-2">
            <div class="cart_group_input">
                <span class="add_to_cart_decrease_button">
                    <img src="{{asset('image/icon/Decrease.svg')}}" alt="Decrease Icon" />
                </span>
                <input type="number" class="product_quantity" value="4" name="product_quantity_input">
                <span class="add_to_cart_increase_button">
                    <img src="{{asset('image/icon/Increase.svg')}}" alt="Increase Icon" />
                </span>
            </div>
        </div>
        <div class="col-2">
            <p class="temporary_product_price"></p>
        </div>
        <div class="col-1">
            <x-trash-icon />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-5">
            <div class="cart_book_detail">
                <img src="https://salt.tikicdn.com/cache/280x280/ts/product/3e/b8/7b/d4ac28e5e26e50815b96547fd4f868b6.jpg.webp" class="card-img-top" alt="englishGrammarInUse">
                <p>First book</p>
            </div>
        </div>
        <div class="col-2">
            <p>
                {{$unit_price}}
                <sup>₫</sup>
            </p>
        </div>
        <div class="col-2">
            <div class="cart_group_input">
                <span class="add_to_cart_decrease_button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                    </svg>
                </span>
                <input type="number" class="product_quantity" value="1" name="product_quantity_input">
                <span class="add_to_cart_increase_button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="col-2">
            <p class="temporary_product_price"></p>
        </div>
        <div class="col-1">
            <x-trash-icon />
        </div>
    </div>
</div>