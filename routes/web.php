<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('MarketPlace', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),

    ]);
});
Route::get('/product/{id}', function () {
    return Inertia::render('Product', [

    ]);
});
Route::get('/home', function () {
    return Inertia::render('Welcome', []);
});
Route::get('/checkout', function () {
    return Inertia::render('Checkout', []);
});
Route::get('/about', function () {
    return Inertia::render('About', []);
});
Route::get('/contact', function () {
    return Inertia::render('Contact', []);
});
Route::get('/transaction', function () {
    return Inertia::render('Transaction', []);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/orders', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('orders');

Route::get('/reports', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('reports');

require __DIR__.'/auth.php';
