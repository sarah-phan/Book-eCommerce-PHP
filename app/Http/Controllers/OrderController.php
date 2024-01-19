<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function makeOrder(Request $request)
    {
        $userId = Auth::user()->user_id;
        // dd($request);
        $validatedData = [];
        array_push($validatedData, $request->validate([
            'shipping_information_id' => ['required'],
            'paymentMethod' => ['required'],
        ]));
        if ($request->paymentMethod === 'Card') {
            array_push($validatedData, $request->validate([
                'nameOnCard' => ['required', 'string', 'regex:/^[A-Z]+$/'],
                'expireDate' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
                'cvvCode' => ['required', 'regex:/^\d{3}$/']
            ]));
        };

        foreach ($validatedData as $validatedData) {
            $orderData = new Order();
            $orderData->order_id = (string) Str::uuid();
            $orderData->shipping_information_id = $validatedData['shipping_information_id'];
            $orderData->user_id = $userId;
            $orderData->total_price = $request->total;
            if ($validatedData['paymentMethod'] == "Cash") {
                $orderData->order_status = "Confirming";
            }
            $orderData->save();
        }

        $cartData = Cart::where('user_id', $userId)->with('book')->first();
        $cartItemData = [];
        foreach($cartData->book as $cartData){
            $sub_array = [
                $cartData->book_id,
                $cartData->pivot->quantity
            ];
            array_push($cartItemData, $sub_array);
        }
        foreach($cartItemData as $data){
            $orderData->book()->attach($data[0], [
                'order_item_id' => (string) Str::uuid(),
                'book_id' => $data[0],
                'quantity' => $data[1],
                'order_id' => $orderData->order_id
            ]);
        }
        dd("test");
    }
}
