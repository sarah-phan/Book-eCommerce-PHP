<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function makeOrder(Request $request, $totalValue)
    {
        //Initialize
        $userId = Auth::user()->user_id;
        $cartData = Cart::where('user_id', $userId)->with('book')->first();
        $validatedData = [];

        //Validation
        array_push($validatedData, $request->validate(
            [
                'shipping_information_id' => ['required'],
                'paymentMethod' => ['required'],
            ],
            [
                'shipping_information_id.required' => "Please choose an address",
                'paymentMethod.required' => "Please choose a payment method"
            ]
        ));

        if ($request->paymentMethod === 'Card') {
            array_push($validatedData, $request->validate([
                'nameOnCard' => ['required', 'string', 'regex:/^[A-Z]+$/'],
                'expireDate' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
                'cvvCode' => ['required', 'regex:/^\d{3}$/']
            ]));
        };

        if($cartData->book != []){
            return redirect()->back()->with('cartEmptyMessage', "Your cart is empty. Add some products");
        }

        //Add Data to order table
        foreach ($validatedData as $validatedData) {
            $orderData = new Order();
            $orderData->order_id = (string) Str::uuid();
            $orderData->shipping_information_id = $validatedData['shipping_information_id'];
            $orderData->user_id = $userId;
            $orderData->total_price = $totalValue;
            if ($validatedData['paymentMethod'] == "Cash") {
                $orderData->order_status = "Confirming";
            }
            if ($validatedData['paymentMethod'] == "Card") {
                $orderData->order_status = "Pending";
            }
            $orderData->save();
        }

        //Add data to cart item table
        $cartItemData = [];
        foreach ($cartData->book as $data) {
            $sub_array = [
                $data->book_id,
                $data->pivot->quantity
            ];
            array_push($cartItemData, $sub_array);
            //delete cart_item
            $cartData->book()->detach($data->book_id);
        }
        foreach ($cartItemData as $data) {
            $orderData->book()->attach($data[0], [
                'order_item_id' => (string) Str::uuid(),
                'book_id' => $data[0],
                'quantity' => $data[1],
                'order_id' => $orderData->order_id
            ]);
        }

        //Redirect after succefully add
        if ($validatedData['paymentMethod'] == "Cash") {
            return view('user.order-success-confirm');
        }
    }
}
