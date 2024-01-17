<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function showOrderList(){
        $data = Order::with('book', 'shipping_information')->get();
        $orderData = $data->map(function($data){
            return[
                'order_id' => $data->order_id,
                'user_id' => $data->user_id,
                'total_price'=>$data->total_price,

                'book_id' => $data->book->pluck('book_id'),
                'title' => $data->book->pluck('title'),
                'price' => $data->book->pluck('price'),
                'book_image_path'=>$data->book->pluck('book_image_path'),

                'receive_name' => $data->shipping_information->receiver_name,
                'receive_phone' => $data->shipping_information->receiver_phone,
                'address' => $data->shipping_information->address
            ];
        });
        // dd($orderData);
        return view('admin.admin-order-list', compact('orderData'));
    }

    public function getOrderById($order_id){
        $data = Order::with('book', 'shipping_information', 'transaction')->find($order_id);
        return view('admin.admin-order-detail', compact('data'));
    }

    public function getOrderStatus($order_id){
        $data = Order::find($order_id);
        return view('admin.editFunction.admin-edit-order', compact('data'));
    }

    public function updateOrderStatus($order_id, Request $request){
        $data = Order::find($order_id);
        $data->order_status = $request->order_status;
        $data->save();
        return redirect('/admin-order-main')->with('message', 'Edit successfully');
    }
}
