<?php

namespace App\Http\Controllers;

use auth;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Vendor/Products', [
            'products' => auth()->user()->products()->get(['name','id','description','status','images','price', 'in_stock'])
        ]);
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
           // 'images' => 'required',
            'in_stock' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        $user  = auth()->user();

        $product =   $user->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'images' => $request->images,
            'price' => $request->price,
            'in_stock' => $request->in_stock,
            'category_id' => $request->category_id,

        ]);

        $products = $user->products()->get(['name', 'id', 'description', 'status', 'images', 'price', 'in_stock']);
        return Inertia::render('Vendor/Products', [
            'products'=> $products
        ]);
    }
    public function allproducts()
    {

        return Product::with('user')->inRandomOrder()->paginate(20);
    }

    public function getstoreproducts()
    {
        $user  = auth()->user();
        return $user->products()->with('store')->get();
    }
      public function show(Product $product)
    {
        return $product;
    }

    public function update(Product $product, Request $request)
    {

        if ($request->has('name') && $request->filled('name')) {
            $product->name = $request->name;
        }
        if ($request->has('description') && $request->filled('description')) {
            $product->description = $request->description;
        }
        if ($request->has('in_stock') && $request->filled('in_stock')) {
            $product->in_stock = $request->in_stock;
        }
        if ($request->has('images') && $request->filled('images')) {
            $product->images = $request->images;
        }
          if ($request->has('price') && $request->filled('price')) {
            $product->price = $request->price;
        }
        if ($request->has('status') && $request->filled('status')) {
            $product->status = $request->status;
        }

        $product->save();
        $user  = auth()->user();
        $products = $user->products()->get(['name', 'id', 'description', 'status', 'images', 'price', 'in_stock']);
        return Inertia::render('Vendor/Products', [
            'products' => $products,
            'flash' => ['message' => 'success']
        ]);
    }

    public function destroy( $id)
    {
        $product = Product::find($id);
        $user  = auth()->user();
        $product->delete();
        $products = $user->products()->get(['name', 'id', 'description', 'status', 'images', 'price', 'in_stock']);
        return Inertia::render('Vendor/Products', [
            'products' => $products,
            'flash'=> ['message'=>'success']
        ]);
    }
}
