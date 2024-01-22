<x-app-layout>
    <div class="shipping_payment_wrapper">
        @error('shipping_information_id')
        <div class="show_cart_error_message">{{ $message }}</div>
        @enderror
        @error('paymentMethod')
        <div class="show_cart_error_message">{{ $message }}</div>
        @enderror
        @if(session()->has('cartEmptyMessage'))
        <div class="show_cart_error_message">{{ session()->get('cartEmptyMessage') }}</div>
        @endif
        <form action="/order/{{$totalValue}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="shipping_information_wrapper">
                        <div class="shipping_information_header">
                            <p class="shipping_information_title">Deliver to</p>
                            <a href="/cart/shipping-information-edit" class="shipping_information_edit">Edit</a>
                        </div>
                        @if($shippingData->isEmpty())
                        <p class="cart_subtitle" style="text-align: center; margin-bottom: 0;">You haven't stored any address</p>
                        @else
                        @foreach($shippingData as $data)
                        <div class="d-flex" style="margin-bottom: 20px">
                            <input type="checkbox" value="{{$data->shipping_information_id}}" name="shipping_information_id" />
                            <div class="align-self-center receiver_info">
                                <span class="receiver_name">{{$data->receiver_name}}</span>
                                <span class="receiver_phone">{{$data->receiver_phone}}</span>
                                <p class="receiver_address">{{$data->address}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="payment_choose_wrapper">
                        <p class="payment_choose_title">Payment Method</p>
                        <button type="button" class="payment_by_cash" onclick="expandButton('payment_by_cash_button', 'payment_by_cash_content')" id="payment_by_cash_button">
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
                        <button type="button" class="payment_by_card" id="payment_by_card_button">
                            <div class="button_header d-flex" onclick="expandButton('payment_by_card_button', 'payment_by_card_content')">
                                <span>Card</span>
                                <span>
                                    <img src="{{asset('image/icon/Card.svg')}}" alt="Card Icon" />
                                </span>
                            </div>
                            <div class="payment_by_card_content hidden" id="payment_by_card_content">
                                <p>
                                    Secure and convenient – pay for your items online using your credit or debit card!
                                </p>
                                <p>
                                    Enjoy a seamless shopping experience with quick, electronic transactions. No need to provide bank account details for returns or refunds.
                                </p>
                            </div>
                        </button>
                        <input type="hidden" name="paymentMethod" id="paymentMethod" value="">
                    </div>
                </div>
            </div>
            <div class="order_button_container">
                <button class="order_button" type="submit">
                    Order
                </button>
            </div>
        </form>
    </div>
</x-app-layout>