<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUserController;

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
        'categories' => Category::get(['id','name']),
        'stores' => User::where('role_id',2)->get(['id', 'name'])

    ]);
});
Route::get('/product/{id}', function () {
    return Inertia::render('Product', []);
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
Route::get('/category', function () {
    return Inertia::render('Categories', []);
});
Route::get('/stores', function () {
    return Inertia::render('Stores', []);
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/redirectAuthenticatedUser', [RedirectAuthenticatedUserController::class, 'home']);

    Route::group(['middleware' => 'checkrole:admin'], function () {
        Route::get('/admin-dashboard', function () {
            return Inertia::render('AdminDashboard');
        })->name('AdminDashboard');

        Route::resource('categories', CategoryController::class, [
            'names' => [
                'index' => 'categories.index',
                'store' => 'categories.store',
                'destroy' => 'categories.destroy',
                'update' => 'categories.update',

            ]
        ]);
    });
    Route::group(['middleware' => 'checkrole:vendor'], function () {
        Route::resource('products', ProductController::class, [
            'names'=>[
                'index' => 'products.index',
                'store' => 'products.store',
                'destroy' => 'products.destroy',
                'update' => 'products.update',

            ]
        ]);
        Route::get('/dashboard', function () {
            return Inertia::render('Vendor/Dashboard');
        })->name('dashboard');


        Route::get('/orders', function () {
            return Inertia::render('Vendor/Orders');
        })->name('orders');

        Route::get('/reports', function () {
            return Inertia::render('Vendor/Reports');
        })->name('reports');
    });

});

require __DIR__ . '/auth.php';
