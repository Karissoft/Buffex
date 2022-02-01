<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                return $a;
            });

            $order->orderhistories()->createMany($mappedcart);

            $order->storeorder()->createMany($mappedcart);

            $orderinfo =    $order->orderinfo()->create([
                'user_id' => $user->id,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
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


            // $myrequest = new Request();
            // $myrequest->setMethod('POST');
            // $myrequest->request->add([
            //     'amount' => $grand_total,
            //     'email' => $user->email,
            //     'order_id' => $order->id
            // ]);


            // $payment  = new BankDetailController();
            // $payment_data = $payment->makepayment($myrequest);



            // clear cart
            // $cartservice->clearcart($user);

            return Inertia::render('Transaction', [
                'order' => $order
            ]);

            // return response()->json(
            //     [
            //         'status' => true,
            //         'message' => 'order created',
            //         // 'data' => $payment_data,
            //         'order' => $order
            //     ],
            //     201
            // );
        });
    }

    public function update(Order $order, Request $request)
    {
    }

    public function destroy(Order $order)
    {
    }
}
