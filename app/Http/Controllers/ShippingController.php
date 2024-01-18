<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ShippingInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShippingController extends Controller
{
    public function showShippingList(){
        $userId = Auth::user()->user_id;
        $shippingData = ShippingInformation::where('user_id', $userId)->get();
        return view('user.shipping-edit', compact('shippingData'));
    }
    public function addShippingInformation(Request $request){
        $userId = Auth::user()->user_id;
        $shippingData = new ShippingInformation();
        $shippingData->shipping_information_id = (string) Str::uuid();
        $shippingData->receiver_name = $request->receiver_name;
        $shippingData->receiver_phone = $request->receiver_phone;
        $shippingData->address = $request->address;
        $shippingData->user_id = $userId;
        $shippingData->save();
        return redirect('/cart');
    }

    public function updateShippingInformation(Request $request, $cartId){
        $data = ShippingInformation::find($cartId);
        $data->receiver_name = $request->receiver_name;
        $data->receiver_phone = $request->receiver_phone;
        $data->address = $request->address;
        $data->save();
        return redirect('/cart');
    }

    public function deleteShipping($cartId){
        $data = ShippingInformation::find($cartId);
        $data->delete();
        return redirect('/cart');
    }
}
