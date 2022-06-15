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
            'status' => $request->status,
            'sizes' => $request->sizes,
            'colors' => $request->colors,

        ]);

        $products = $user->products()->get();
        return Inertia::render('Vendor/Products', [
            'products' => $products
        ]);
    }
    public function allproducts(Request $request)
    {

        $storeIds = [];
        $categoryIds = [];
        $priceType = null;
        if ($request->query('storeIds')) {
            $storeIds = explode(',', $request->query('storeIds'));
        }
        if ($request->query('categoryIds')) {
            $categoryIds = explode(',', $request->query('categoryIds'));
        }
        if ($request->query('priceType')) {
            $priceType = $request->query('priceType');
        }

        $query = Product::where('status', 1)->where('in_stock', '>', '0')->with('user', 'category')
            ->where(function ($query) use ($categoryIds) {
                if (count($categoryIds)) {
                    $query->whereIn('category_id', $categoryIds);
                }
            })->where(function ($query) use ($storeIds) {
                if (count($storeIds)) {
                    $query->whereIn('user_id', $storeIds);
                }
            });

        if ($priceType == 'lth') {
            $query->orderBy('price');
        }

        if ($priceType == 'htl') {
            $query->orderByDesc('price');
        }
        return $query->paginate(20);
    }
    public function adminallproducts()
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
            $product->sizes = $request->sizes;
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
            })->orWhereHas('user', function ($a) use ($query) {
                return $a->where('name',  $query);
            })->paginate(20);
        }
        return response()->json([
            'status' => 'false',
            'message' => 'no product found'
        ]);
    }
}
