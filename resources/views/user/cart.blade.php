<?php
$total_item_number = 4;
$unit_price = number_format(163800, 0, '', ',');
?>

<x-app-layout>
    <div class="cart_wrapper" style="margin: auto; width: 97%;">
        <h4 class="cart_title">Shopping cart</h4>
        <p class="cart_subtitle">There are {{$total_item_number}} items in your cart</p>
        <div class="row no-gutters">
            <div class="col-8">
                @include('user/cart-detail')
            </div>
            <div class="col-4">
                @include('user/shipping-payment-detail')
            </div>
        </div>
    </div>
</x-app-layout>