<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart($bookId, Request $request)
    {
        dd($request);
        if (Auth::user()) {
            // $data = new Cart();
            return redirect()->back()->with('message', 'Add product to cart successfully');
        }
        else{
            return redirect('/redirect')->with('message', 'Please login first');
        }
    }
}
