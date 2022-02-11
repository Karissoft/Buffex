<?php

namespace App\Http\Controllers;

use auth;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Order::where("order_no", "=", $code)->first());

        return $code;
    }
    public function index()
    {
    }

    public function store(Request $request)
    {
        return  DB::transaction(function () use ($request) {
            $user = auth()->user();
            $usercart = $request->cartItems;

            $order = new Order();
            $order->order_no = $this->generateUniqueCode();
            $order->status = 'pending';
            $order->total_amount = $request->total;
            $order->tax = 0;
            $order->commission = 0;
            $order->shipping_charges = 0;
            $order->promo = $request->promo;
            $order->discount = 0;
            $order->grand_total = $request->total;
            $order->user_id = $user->id;

            $order->save();

            $mappedcart = collect($usercart)->map(function ($a) use ($order) {
                $a['product_id'] = $a['id'];
                $a['order_no'] = $order->order_no;
                $a['order_id'] = $order->id;
                $a['subtotal'] = $order->quantity * $order->price;
                return $a;
            });

            $order->orderhistories()->createMany($mappedcart);
            $order->storeorder()->createMany($mappedcart);

            $orderinfo =    $order->orderinfo()->create([
                'user_id' => $user->id,
                'firstName' => $request->name,
                'lastName' => $request->name,
                'shipping_method' => 'standard',
                'shipping_address' => $request->address,
                'pickup_location' => $request->pickup_location,
                'email' => $user->email,
                'city' => $request->city,
                'state' => $request->state,
                'phoneNumber' => $request->phone,
                'extra_instruction' => $request->extra_instruction,
                'payment_method' => 'online'
            ]);

            //update user profile here
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state =  $request->state;
            $user->phone_no =  $request->phone;
            $user->country =  $request->country;
            $user->save();




            // &source_amount=2
            //   &order_number=1
            //   & currency=BTC
            //   &email=customer@buffex.co
            //   &order_name=btc1
            //   &api_key=SECRET_KEY
            $amount = $request->total;
            $apikey = '3EED-2398-ADK';
              $response =   Http::get('https://buffex.co/api/create-invoice', [
                'source_amount' => $amount,
                'order_number' => $order->order_no,
                'currency' => $request->currency,
                'email' => $user->email,
                'order_name' => 'order_name',
                'api_key' => $apikey,
                'callback_url' => 'http://localhost:3000/transaction'
            ]);
            if ($response['status'] === 'success') {
                $txn_id = $response['data']['txn_id'];
                $url = $response['data']['invoice_url'];
            } else {
                return response($response['data']['message'], 400);
            }

            $payment = $user->payments()->create([
                'type' => 'crypto',
                'reference' => $order->order_no,
                'amount' => $amount,
                'status' => 'pending',
                'transactionRef' =>  $txn_id,
                'mesaage' =>  'Awaiting payment'

            ]);
            return response([

                'url' => $url
            ], 200);
        });
    }

    public function update(Order $order, Request $request)
    {
    }

    public function verify( $txn_id)
    {
        $payment = Payment::where('transactionRef', $txn_id)->first();
        $payment->status = 'paid';
        $payment->message= 'successful';
        $payment->save();
        $order = Order::where('order_no', $payment->reference)->first();
        $items = OrderHistory::where('order_id', $order->id)->count();
        return  [
            'order' => $order,
            'payment' => $payment,
            'items'=>$items
        ];
    }
}
