<form class="add_to_cart_wrapper" method="POST" action="{{url('/add-to-cart', $bookData->book_id)}}">
    @csrf
    <p class="add_to_cart_title">Quantity</p>
    <div class="group-input">
        <button name="action" value="decrease" class="quantity_button">
            <img src="{{asset('image/icon/Decrease.svg')}}" alt="Decrease Icon" />
        </button>
        <input type="number" class="product_quantity" value="1" name="product_quantity_input">
        <button name="action" value="increase" class="quantity_button">
            <img src="{{asset('image/icon/Increase.svg')}}" alt="Increase Icon" />
        </button>
    </div>
    <p class="temporary_product_price_title" style="margin-top:20px;">Temporary price</p>
    <h4 class="temporary_product_price"></h4>
    <button class="add_to_cart_submit_button" type="submit">Add to cart</button>
</form>
