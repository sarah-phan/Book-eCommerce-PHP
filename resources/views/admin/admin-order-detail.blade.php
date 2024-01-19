<x-admin-layout>
    <p class="order_detail_header">DETAIL OF ORDER #{{$data->order_id}}</p>
    <div class="order_detail_container">
        <div class="order_detail_header">
            <div class="row">
                <div class="col-4 receiver_information">
                    <p>SHIPPING INFORMATION</p>
                    <div class="order_detail_shipping_information_box">
                        <div class="order_detail_content_container">
                            <span class="order_detail_span_lable">Receiver name:</span>
                            <span>{{strtoupper($data->shipping_information->receiver_name)}}</span>
                        </div>
                        <div class="order_detail_content_container">
                            <span class="order_detail_span_lable">Receiver address:</span>
                            <span>{{$data->shipping_information->address}}</span>
                        </div>
                        <div class="order_detail_content_container">
                            <span class="order_detail_span_lable">Receiver phone:</span>
                            <span>{{$data->shipping_information->receiver_phone}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 order_status">
                    <p>ORDER STATUS</p>
                    <div class="order_detail_order_status_box">
                        <div class="order_detail_content_container">
                            <span class="order_detail_span_lable">Order date:</span>
                            <span>{{$data->created_at}}</span>
                        </div>
                        <div class="order_detail_content_container">
                            <span class="order_detail_span_lable">Order status:</span>
                            <span>{{$data->order_status}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 payment_type">
                    <p>PAYMENT TYPE</p>
                    <div class="order_detail_payment_type_box">
                        <p style="font-weight: normal">Order paid by
                            <span style="color: #2E3192; font-weight:600">{{$data->transaction->payment_type}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="order_detail_body">
            <table style="width:100%">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Subtotal</th>
                </tr>
                @foreach($data->book as $bookData)
                <?php
                $unit_price = $bookData->price;
                $quantity = $bookData->pivot->quantity;
                $subtotal = number_format($unit_price * $quantity, 0, '', ',');
                $imageUrl = \Illuminate\Support\Facades\Storage::url($bookData->book_image_path);
                ?>
                <tr>
                    <td class="order_detail_book_detail">
                        <img class="book_image_order" src="{{ $imageUrl }}" />
                        <div class="order_detail_book_detail_container">
                            <p class="order_detail_book_detail_p">{{$bookData->title}}</p>
                            <p class="book_id_p">Book ID: {{$bookData->book_id}}</p>
                        </div>
                    </td>
                    <td>
                        <p>{{$bookData->pivot->quantity}}</p>
                    </td>
                    <td>
                        <p>{{number_format($bookData->price, 0, '', ',')}}</p>
                    </td>
                    <td>
                        <p>{{$subtotal}}</p>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="order_detail_total_price">
                <?php
                $total_price = number_format($data->total_price, 0, '', ',');
                ?>
                <p class="order_footer_label">Total price:</p>
                <p class="order_footer_unit_price">{{$total_price}}</p>
                @if(!($data->order_status === "Success" || $data->order_status === "Cancel"))
            </div>
            <div class="direct_button_detail">
                <a href="/admin-order-main/detail/edit/{{$data->order_id}}">Edit order status</a>
            </div>
            @endif
        </div>
    </div>
</x-admin-layout>