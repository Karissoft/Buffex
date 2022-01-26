<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
    }
    public function addtocart(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'price'  => 'required',
            'total'  => 'required',
            'product_id'  => 'required',
            'store_id'  => 'required',
        ]);

        $user  = auth::user();
        $user->cart()->create([
            'quantity' => $request->quantity,
            'price'  => $request->price,
            'total'  => intval($request->price) * intval($request->quantity),
            'product_id'  =>  $request->product_id,
            'store_id'  => $request->store_id,
        ]);
        return response('ok');
    }
    public function addcart(Request $request)
    {
        $user  = auth::user();
        $cart = Cart::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        if (!is_null($cart)) {
            $cart->quantity =  $cart->quantity++;
            $cart->save();
        } else {
            $user->cart()->create([
                'quantity' => $request->quantity,
                'price'  => $request->price,
                'total'  => intval($request->price) * intval($request->quantity),
                'product_id'  =>  $request->product_id,
                'store_id'  => $request->store_id,
            ]);
        }
        return response('ok');
    }

    public function removecart(Cart $cart)
    {

        if ($cart->quantity > 1) {
            $cart->quantity =  $cart->quantity--;
            $cart->save();
        } else {
            $cart->delete();
        }
        return response('ok');
    }
    public function carttotal()
    {

        $user = auth::user();
        $carttotal = $user->cart()->get()->map(function ($cart) {
            return $cart->quantity * $cart->price;
        })->reduce(function ($a, $b) {
            return $a + $b;
        });

        return response([
            'total' => $carttotal
        ], 200);
    }


    public function destroy()
    {

        $user = auth::user();
        $carts = $user->cart()->get();
        $carts->delete();
        return response('ok');
    }
}
