@extends('layouts.admin')
@section('content')
@if(session()->has('message'))
<p class="success_message">{{session()->get('message')}}</p>
@endif
<h2 class="main_page_title">Order</h2>
@foreach($orderData as $orderData)
<div class="order_list_container">
    <div class="order_box_container">
        <div class="order_header">
            <div class="order_id">
                <span>Order ID</span>
                <span>{{$orderData['order_id']}}</span>
            </div>
            <div class="user_id">
                <span>User ID</span>
                <span>{{$orderData['user_id']}}</span>
            </div>
        </div>
        <hr />
        <div class="order_body">
            @foreach($orderData['book_image_path'] as $index => $path)
            <div class="row">
                <div class="col-1">
                    <?php
                    $imageUrl = \Illuminate\Support\Facades\Storage::url($path);
                    ?>
                    <img class="book_image_order" src="{{ $imageUrl }}" />
                </div>
                <div class="col-9">
                    <p style="margin-bottom: 5px;">{{ $orderData['title'][$index] }}</p>
                    <p class="book_id_p">Book ID: {{$orderData['book_id'][$index]}}</p>
                </div>
                <div class="col-2 book_unit_price">
                    <?php
                    $unit_price = number_format($orderData['price'][$index], 0, '', ',');
                    ?>
                    <p>{{$unit_price}}</p>
                </div>
            </div>
            <hr />
            @endforeach

        </div>
        <div class="order_footer">
            <div class="total_price_order">
                <p class="order_footer_label">Total price</p>
                <?php
                $total_price = number_format($orderData['total_price'], 0, '', ',');
                ?>
                <p class="order_footer_unit_price">{{$total_price}}</p>
            </div>
            <div class="direct_button_detail">
                <a href="/redirect/admin-order-main/detail/{{$orderData['order_id']}}">View detail</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection