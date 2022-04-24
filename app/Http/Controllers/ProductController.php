<?php

namespace App\Http\Controllers;

use auth;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Vendor/Products', [
            'products' => auth()->user()->products()->get(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images' => 'required',
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
            'status' => false,
            'size' => $request->size,
            'status' => $request->colors,

        ]);

        $products = $user->products()->get();
        return Inertia::render('Vendor/Products', [
            'products' => $products
        ]);
    }
    public function allproducts()
    {

        return Product::with('user', 'category')->paginate(20);
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
        if ($request->has('size') && $request->filled('size')) {
            $product->size = $request->size;
        }
        if ($request->has('colors') && $request->filled('colors')) {
            $product->colors = $request->colors;
        }

        $product->save();
        $user  = auth()->user();
        $products = $user->products()->get();
        return Inertia::render('Vendor/Products', [
            'products' => $products,
            'flash' => ['message' => 'success']
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $user  = auth()->user();
        $product->delete();
        $products = $user->products()->get();
        return Inertia::render('Vendor/Products', [
            'products' => $products,
            'flash' => ['message' => 'success']
        ]);
    }

    public function searchproducts(Request $request)
    {
        $query = $request->query('query');

        if ($request->has('query') && $query) {

            return Product::query()->with('user', 'category')->whereLike('name', $query)->orWhereHas('category', function ($a) use ($query) {
                return $a->where('name',  $query);
            })->paginate(20);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'no product found'
        ]);
    }
}
