<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\StoreOrder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),


    ]);
});
Route::get('/product/{id}', function ($id) {
    return Inertia::render('Product', [
        'product' => Product::where('id', $id)->with('user', 'category')->first()
    ]);
});
Route::get('/marketplace', function () {
    return Inertia::render('MarketPlace', [
        'categories' => Category::get(['id', 'name']),
        'stores' => User::where('role_id', 2)->get(['id', 'name'])
    ]);
});

Route::get('/blog', function () {
    return Inertia::render('Blog', []);
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
Route::get('verify-transaction/{txn_id}', [OrderController::class, 'verify']);
Route::get('/category', function () {
    return Inertia::render('Categories', []);
});
Route::get('/stores', function () {
    return Inertia::render('Stores', []);
});

Route::resource('orders', OrderController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/redirectAuthenticatedUser', [RedirectAuthenticatedUserController::class, 'home']);

    Route::group(['middleware' => 'checkrole:admin'], function () {
        Route::get('/admin-dashboard', function () {
            return Inertia::render('AdminDashboard', [
                'products' => Product::get()->count(),
                'customers' => User::where('role_id', 3)->get()->count(),
                'orders' => Order::get()->count(),
                'stores' => User::where('role_id', 3)->get()->count(),
            ]);
        })->name('AdminDashboard');

        Route::resource('categories', CategoryController::class, [
            'names' => [
                'index' => 'categories.index',
                'store' => 'categories.store',
                'destroy' => 'categories.destroy',
                'update' => 'categories.update',

            ]
        ]);
        Route::get('/all-stores', function () {
            return Inertia::render('Admin/Stores');
        })->name('AllStores');
        Route::get('/all-products', function () {
            return Inertia::render('Admin/Products');
        })->name('AllProducts');
        Route::get('/all-customers', function () {
            return Inertia::render('Admin/Customers', [
                'customers' => User::where('role_id', 3)->get()
            ]);
        })->name('AllCustomers');
        Route::get('/all-orders', function () {
            return Inertia::render('Admin/Orders');
        })->name('AllOrders');
        Route::get('/all-payments', function () {
            return Inertia::render('Admin/Payments');
        })->name('AllPayments');


        Route::get('/get-stores', [StoreController::class, 'getstores']);
        Route::get('/searchstores', [StoreController::class, 'searchstores']);

        Route::get('/get-customers', [StoreController::class, 'getcustomers']);
        Route::get('/searchcustomers', [StoreController::class, 'searchcustomers']);

        Route::get('/admin-get-orders', [OrderController::class, 'getadminstores']);
        Route::get('/searchorders', [OrderController::class, 'searchorders']);

        Route::get('/get-payments', [PaymentController::class, 'getpayments']);
        Route::get('/searchpayments', [PaymentController::class, 'searchpayments']);
    });


    Route::group(['middleware' => 'checkrole:vendor'], function () {
        Route::resource('products', ProductController::class, [
            'names' => [
                'index' => 'products.index',
                'store' => 'products.store',
                'destroy' => 'products.destroy',
                'update' => 'products.update',

            ]
        ]);
        Route::get('/dashboard', function () {
            return Inertia::render('Vendor/Dashboard', [
                'orders' => auth()->user()->storeorder()->with('product')->latest()->limit(10)->get(),
                'total_orders' => auth()->user()->storeorder()->count(),
                'total_products' => auth()->user()->products()->count(),
            ]);
        })->name('dashboard');


        Route::get('store/orders', function () {
            return Inertia::render('Vendor/Orders', [
                'orders' => auth()->user()->storeorder()->with('product')->latest()->get()
            ]);
        })->name('orders');

        Route::get('store/order/{id}', function ($id) {
            $order  = StoreOrder::find($id);
            return Inertia::render('Vendor/Order', [
                'order' => $order->load('product', 'orderinfo', 'order')
            ]);
        })->name('order');

        Route::get('/reports', function () {
            return Inertia::render('Vendor/Reports');
        })->name('reports');

        Route::get('/get-orders', [OrderController::class, 'getorders']);
    });

    Route::group(['middleware' => 'checkrole:user'], function () {

        //  Route::resource('orders', OrderController::class);
    });
});
Route::get('/checkout', function () {
    return Inertia::render('Checkout', []);
});

Route::get('/get-products', [ProductController::class, 'allproducts']);

Route::get('/get-users', [RegisteredUserController::class, 'getusers']);
Route::get('/get-vendors', [RegisteredUserController::class, 'getvendors']);
Route::get('/searchproducts', [ProductController::class, 'searchproducts']);

Route::get('/get-categories', [CategoryController::class, 'getcategories']);

Route::post('/contact-us', [MailController::class, 'contact']);

require __DIR__ . '/auth.php';
