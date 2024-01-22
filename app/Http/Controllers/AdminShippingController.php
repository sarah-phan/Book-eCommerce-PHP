<?php

namespace App\Http\Controllers;

use App\Models\ShippingInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminShippingController extends Controller
{
    public function getUserList()
    {
        $userData = User::all();
        return view('admin.addFunction.admin-add-shipping', compact('userData'));
    }
    public function addShippingInfor(Request $request)
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

        $data = new ShippingInformation();
        $data->shipping_information_id = (string) Str::uuid();
        $data->receiver_name = $validatedData['receiver_name'];
        $data->receiver_phone = $validatedData['receiver_phone'];
        $data->address = $validatedData['address'];
        $data->user_id = $request->user_id;
        $data->save();

        return redirect('/admin-shipping-information-main')
            ->with('message', 'Add successfully');
    }

    public function showShippingList()
    {
        $shipping = ShippingInformation::with('user')->get();
        $data = $shipping->map(function ($shipping) {
            return [
                'shipping_information_id' => $shipping->shipping_information_id,
                'receiver_name' => $shipping->receiver_name,
                'receiver_phone' => $shipping->receiver_phone,
                'address' => $shipping->address,
                'user_name' => $shipping->user->user_name,
            ];
        });
        return view('admin.admin-list', compact('data'));
    }
}
