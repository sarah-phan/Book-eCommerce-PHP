<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    public function makeOrder(Request $request, $totalValue)
    {
        //Initialize
        $userId = Auth::user()->user_id;
        $cartData = Cart::where('user_id', $userId)->with('book')->first();

        //Validation
        $validatedData = $request->validate(
            [
                'shipping_information_id' => ['required'],
                'paymentMethod' => ['required'],
            ],
            [
                'shipping_information_id.required' => "Please choose an address",
                'paymentMethod.required' => "Please choose a payment method"
            ]
        );

        $checkCartItem = [];
        foreach ($cartData->book as $data) {
            array_push($checkCartItem, $data);
        }
        if ($checkCartItem == []) {
            return redirect()->back()->with('cartEmptyMessage', "Your cart is empty. Add some products");
        }

        //Add Data to order table
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

    
        if ($validatedData['paymentMethod'] == "Cash") {
            $transaction = new Transaction();
            $transaction->transaction_id = (string) Str::uuid();
            $transaction->order_id = $orderData->order_id;
            $transaction->payment_type = "Cash";
            $transaction->payment_status = "Pending";
            $transaction->save();

            return view('user.order-success-confirm');
        }

        if ($validatedData['paymentMethod'] == "Card") {
            return redirect("/handleCardPayment/{$orderData->order_id}");
        }
    }

    public function handleCardPayment($orderId)
    {
        $orderData = Order::with('book')->find($orderId);
        if ($orderData->order_status == 'Pending') {
            $lineItems = [];
            foreach ($orderData->book as $data) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'VND',
                        'product_data' => [
                            'name' => $data->title,
                        ],
                        'unit_amount' => $data->price,
                    ],
                    'quantity' => $data->pivot->quantity,
                ];
            }

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $session = $stripe->checkout->sessions->create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('checkout.cancel'),
            ]);

            //update session_id in Order table
            $orderData->session_id = $session->id;
            $orderData->save();

            return redirect($session->url);
        } else {
            throw new NotFoundHttpException;
        }
    }

    public function cardPaymentSuccess(Request $request)
    {
        //create session_id to prevent copy and paste success page
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        try {
            $sessionId = $request->get('session_id');
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }

            //retreive order
            $order = Order::where('session_id', $session->id)->where('order_status', 'Pending')->first();
            $order->order_status = 'Paid';
            $order->save();

            //create Transaction data
            $transaction = new Transaction();
            $transaction->transaction_id = (string) Str::uuid();
            $transaction->order_id = $order->order_id;
            $transaction->payment_type = "Card";
            $transaction->payment_status = "Success";
            $transaction->strip_id = $session->payment_intent;
            $transaction->save();
        } catch (Exception $e) {
            throw new NotFoundHttpException;
        }

        return view('user.order-success-confirm');
    }
    public function cardPaymentCancel(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');
        $session = $stripe->checkout->sessions->retrieve($sessionId);
        return view('user.order-card-fail');
    }
}
