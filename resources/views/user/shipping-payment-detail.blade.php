<div class="shipping_information_wrapper">
    <div class="shipping_information_header">
        <p class="shipping_information_title">Deliver to</p>
        <a href="/cart/shipping-information-edit" class="shipping_information_edit">Edit</a>
    </div>
    @foreach($shippingData as $data)
    <div class="d-flex" style="margin-top: 10px">
        <input type="checkbox" />
        <div class="align-self-center receiver_info">
            <span class="receiver_name">{{$data->receiver_name}}</span>
            <span class="receiver_phone">{{$data->receiver_phone}}</span>
            <p class="receiver_address">{{$data->address}}</p>
        </div>
    </div>
    @endforeach
    <hr />
</div>
<div class="payment_choose_wrapper">
    <p class="payment_choose_title">Payment Method</p>
    <button class="payment_by_cash" onclick="expandButton('payment_by_cash_button', 'payment_by_cash_content')" id="payment_by_cash_button">
        <div class="button_header d-flex">
            <span>Cash on delivery</span>
            <span>
                <img src="{{asset('image/icon/Cash.svg')}}" alt="Cash Icon" />
            </span>
        </div>
        <div class="payment_by_cash_content hidden" id="payment_by_cash_content">
            <p>
                No online payment needed – pay in cash using the exact change once your items are delivered!
            </p>
            <p>
                Your bank account details will only be required if you wish to return anything for a refund.
            </p>
        </div>
    </button>
    <button class="payment_by_card" id="payment_by_card_button">
        <div class="button_header d-flex" onclick="expandButton('payment_by_card_button', 'payment_by_card_content')">
            <span>Card</span>
            <span>
                <img src="{{asset('image/icon/Card.svg')}}" alt="Card Icon" />
            </span>
        </div>
        <div class="payment_by_card_content hidden" id="payment_by_card_content">
            <form class="card_information_form">
                <label for="nameOnCard">Name On Card</label>
                <input type="text" id="nameOnCard" />
                <label for="cardNumber">Card Number</label>
                <input type="number" id="cardNumber" />
                <div class="d-flex">
                    <div>
                        <label for="expireDate">Expire Date</label>
                        <input type="number" id="expireDate" />
                    </div>
                    <div style="margin-left: 30px;">
                        <label for="cvvCode">CVV</label>
                        <input type="number" id="cvvCode" />
                    </div>
                </div>
            </form>
        </div>
    </button>
</div>
<div class="total_amount_wrapper">
    <div class="price_info d-flex">
        <span class="total_amount_title">Total</span>
        <h4 class="total_product_price"></h4>
    </div>
    <button class="cart_order_button">
        Order
    </button>
</div>