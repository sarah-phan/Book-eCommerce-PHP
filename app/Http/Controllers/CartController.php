<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    private function findCartByUserId()
    {
        $userId = Auth::user()->user_id;
        $cartExisted = Cart::where('user_id', $userId)->first();
        return $cartExisted;
    }

    private function handleQuantityInCart($request, $bookId, $cartExisted)
    {
        $relatedBook = $cartExisted->book;
        $quantity = 0;
        foreach ($relatedBook as $book) {
            if ($book->pivot->book_id === $bookId) {
                $quantity = $book->pivot->quantity + $request->product_quantity_input;
            }
        };
        return $quantity;
    }

    public function addCart($bookId, Request $request)
    {
        $cartExisted = $this->findCartByUserId();
        if (Auth::user()) {
            $data = new Cart();
            if ($cartExisted == null) {
                $data->cart_id = (string) Str::uuid();
                $data->user_id = Auth::user()->user_id;
                $data->save();
            }

            $cartExisted = $this->findCartByUserId();

            $data->book()->attach($bookId, [
                'cart_item_id' => (string) Str::uuid(),
                'quantity' => $request->product_quantity_input,
                'cart_id' => $cartExisted->cart_id,
                'book_id' => $bookId
            ]);

            return redirect()->back()->with('cartMessage', 'Add product to cart successfully');
            // } else {
            //     return redirect('/')->with('loginMessage', 'Please login first');
        }
    }
}
