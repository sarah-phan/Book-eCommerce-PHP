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
        $quantity = 0;
        foreach ($cartExisted->book as $book) {
            if ($book->pivot->book_id === $bookId) {
                $quantity = $book->pivot->quantity + $request->product_quantity_input;
            }
        };
        dd($quantity);
        return $quantity;
    }

    public function addCart($bookId, Request $request)
    {
        if (Auth::check()) {
            $data = new Cart();
            $cartExisted = $this->findCartByUserId();

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
        } else {
            return redirect('/')->with('loginMessage', 'Please login first');
        }
    }

    public function showCartDetail()
    {
        $userId = Auth::user()->user_id;
        $cartData = Cart::where('user_id', $userId)->with('book')->first();
        $totalProduct = $cartData->book->count();

        //use foreach instead of map because book data is not a single Book instance, but a collection of books
        $bookData = [];
        foreach ($cartData->book as $data) {
            $sub_array = [
                $data->book_image_path,
                $data->title, $data->price,
                $data->pivot->quantity,
                $data->pivot->cart_id,
                $data->book_id
            ];
            array_push($bookData, $sub_array);
        };
        return view('user.cart', compact('bookData', 'totalProduct'));
    }

    public function updateCart($cartId, $bookId, Request $request)
    {
        $quantityRequest = $request->input('product_quantity_input');
        $cart = Cart::find($cartId);
        $cart->book()->updateExistingPivot($bookId, [
            'quantity' => $quantityRequest
        ]);
        return redirect()->back();
    }

    public function deleteCartItem($cartId, $bookId){
        $cart = Cart::find($cartId);
        $cart->book()->detach($bookId);
        return redirect()->back();
    }
}
