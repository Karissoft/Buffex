<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $user = auth::user();
        $usercart = $user->cart()->get();

        $order = new Order();
        $order->order_no = $this->generateUniqueCode();
        $order->status = $request->status;
        $order->total_amount = $request->total_amount;
        $order->tax = $request->tax;
        $order->commission = $request->commission;
        $order->shipping_charges = $request->shipping_charges;
        $order->promo = $request->promo;
        $order->discount = $request->discount;
        $order->grand_total = $request->grand_total;
        $order->user_id = $user->id;

        $order->save();



        $order->orderhistories()->createMany($usercart->toArray());
        $mappedarray = array_map(function ($a) use ($order) {
            $a['order_no'] = $order->order_no;
            return $a;
        },
            $usercart->toArray()
        );
        $user->storeorder()->createMany($mappedarray);

        $orderinfo =    $order->orderinfo()->create([
            'user_id' => $user->id,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'delivery_method' => $request->delivery_method,
            'shipping_method' => $request->shipping_method,
            'shipping_address' => $request->shipping_address,
            '$pickup_location' => $request->pickup_location,
            'email' => $user->email,
            'city' => $request->city,
            'state' => $request->state,
            'phoneNumber' => $request->phoneNumber,
            'extra_instruction' => $request->extra_instruction,
            'payment_method' => $request->payment_method
        ]);

        //update user profile here
        $user->address = $request->shipping_address;
        $user->city = $request->city;
        $user->state =  $request->state;
        $user->phoneNumber =  $request->phoneNumber;
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


        return response()->json(
            [
                'status' => true,
                'message' => 'order created',
                // 'data' => $payment_data,
                'order' => $order
            ],
            201
        );

    }

    public function update(Order $order, Request $request)
    {
    }

    public function destroy(Order $order)
    {
        
    }
}
