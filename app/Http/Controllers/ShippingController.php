<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ShippingInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShippingController extends Controller
{
    public function showShippingListForChoosing(Request $request)
    {
        $userId = Auth::user()->user_id;
        $shippingData = ShippingInformation::where('user_id', $userId)->get();
        $totalValue = $request->query('total');
        return view('user.shipping-payment-detail', compact('shippingData', 'totalValue'));
    }
    public function showShippingList()
    {
        $userId = Auth::user()->user_id;
        $shippingData = ShippingInformation::where('user_id', $userId)->get();
        return view('user.shipping-edit', compact('shippingData'));
    }
    public function addShippingInformation(Request $request)
    {
        $validatedData = $request->validate(
            [
                'receiver_name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                'receiver_phone' => ['required', 'regex:/^(0|\+84)(3|5|7|8|9)\d{8}$/'],
                'address' => ['required', 'string'],
            ],
            [
                'receiver_name.string' => "Wrong format of receiver name",
                'receiver_phone.regex' => "Wrong format of receiver phone",
                'address' => "Wrong format of address"
            ]
        );
        $userId = Auth::user()->user_id;
        $shippingData = new ShippingInformation();
        $shippingData->shipping_information_id = (string) Str::uuid();
        $shippingData->receiver_name = $validatedData['receiver_name'];
        $shippingData->receiver_phone = $validatedData['receiver_phone'];
        $shippingData->address = $validatedData['address'];
        $shippingData->user_id = $userId;
        $shippingData->save();
        return redirect()->back();
    }

    public function updateShippingInformation(Request $request, $cartId)
    {
        $validatedData = $request->validate(
            [
                'receiver_name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                'receiver_phone' => ['required', 'regex:/^(0|\+84)(3|5|7|8|9)\d{8}$/'],
                'address' => ['required', 'string'],
            ],
            [
                'receiver_name.string' => "Wrong format of receiver name",
                'receiver_phone.regex' => "Wrong format of receiver phone",
                'address' => "Wrong format of address"
            ]
        );

        $data = ShippingInformation::find($cartId);
        $data->receiver_name = $validatedData['receiver_name'];
        $data->receiver_phone = $validatedData['receiver_phone'];
        $data->address = $validatedData['address'];
        $data->save();
        return redirect()->back();
    }

    public function deleteShipping($cartId)
    {
        $data = ShippingInformation::find($cartId);
        $data->delete();
        return redirect('/cart');
    }
}
