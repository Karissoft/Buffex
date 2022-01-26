<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Categories', [
            'categories' => Category::get(['id','name','image'])
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required'
        ]);
          Category::create([
            'name' => $request->name,
            'image' => '$request->image'
        ]);
        return Inertia::render('Admin/Categories', [
            'categories' => Category::get(['id','name','image'])
        ]);
    }

    public function update(Category $category, Request $request)
    {

        if ($request->has('name') && $request->filled('name')) {
            $category->name = $request->name;

        }

        if ($request->has('image') && $request->filled('image')) {
            $category->image = $request->image;
        }

        $category->save();
        return Inertia::render('Admin/Categories', [
            'categories' => Category::get(['id','name', 'image'])
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Inertia::render('Admin/Categories', [
            'categories' => Category::get(['id','name', 'image'])
        ]);
    }
}
