<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();



Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/productDetails/{category_slug}/{product_slug}', 'productDetail');
    Route::get('thank-you', 'thankyou');
    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('search', 'searchProduct');
});

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{id}', [App\Http\Controllers\Frontend\OrderController::class, 'detail']);

    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);

    // category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category',  'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{id}/edit', 'edit');
        Route::put('/category/{id}', 'update');
        Route::get('/category/delete/{id}', 'delete');
    });

    /// brand  routes
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brand',  'index');
        Route::get('/brand/create', 'create');
        Route::post('/brand', 'store');
        Route::get('/brand/{id}/edit', 'edit');
        Route::put('/brand/{id}', 'update');
        Route::get('/brand/delete/{id}', 'delete');
    });


    /// products  routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products',  'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{id}/edit', 'edit');
        Route::put('/products/{id}', 'update');
        Route::get('/products/delete/{id}', 'delete');
    });

    /// sliders  routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders',  'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders', 'store');
        Route::get('/sliders/{id}/edit', 'edit');
        Route::put('/sliders/{id}', 'update');
        Route::get('/sliders/delete/{id}', 'delete');
    });

    /// orders  routes
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders',  'index');
        Route::get('/orders/{id}',  'detail');
        Route::post('/orders/{id}',  'updateOrderStatus');

        Route::get('/invoice/{id}',  'viewInvoice');
        Route::get('/invoice/{id}/generate',  'generateInvoice');
    });

    /// users  routes
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users',  'index');
        Route::get('/users/create',  'create');
        Route::post('/users',  'store');
        Route::get('/users/{id}/edit', 'edit');
        Route::put('/users/{id}', 'update');
        Route::get('/users/delete/{id}', 'delete');
    });
});