<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function showOrderList()
    {
        $data = Order::with('book', 'shipping_information')->get();
        $orderData = $data->map(function ($data) {
            return [
                'order_id' => $data->order_id,
                'user_id' => $data->user_id,
                'total_price' => $data->total_price,

                'book_id' => $data->book->pluck('book_id'),
                'title' => $data->book->pluck('title'),
                'price' => $data->book->pluck('price'),
                'book_image_path' => $data->book->pluck('book_image_path'),

                'receive_name' => $data->shipping_information->receiver_name,
                'receive_phone' => $data->shipping_information->receiver_phone,
                'address' => $data->shipping_information->address
            ];
        });

        return view('admin.admin-order-list', compact('orderData'));
    }

    public function getOrderById($order_id)
    {
        $data = Order::with('book', 'shipping_information', 'transaction')->find($order_id);
        return view('admin.admin-order-detail', compact('data'));
    }

    public function getOrderStatus($order_id)
    {
        $data = Order::find($order_id);
        return view('admin.editFunction.admin-edit-order', compact('data'));
    }

    public function updateOrderStatus($order_id, Request $request)
    {
        $order = Order::find($order_id);
        $order->order_status = $request->order_status;
        $order->save();

        $transaction = Transaction::where('order_id', $order_id)->get();
        foreach ($transaction as $transaction) {
            if ($transaction->payment_type == "Cash" && $request->order_status == "Success") {
                $transaction->payment_status = "Success";
                $transaction->save();
            }
            if ($transaction->payment_type == "Cash" && $request->order_status == "Fail"){
                $transaction->payment_status = "Fail";
                $transaction->save();
            }
        }

        return redirect('/admin-order-main')->with('message', 'Edit successfully');
    }
}
