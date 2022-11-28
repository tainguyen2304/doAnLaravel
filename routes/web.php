<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{params}', [App\Http\Controllers\Frontend\FrontendController::class, 'productsByBrand']);
Route::get('/collections/productDetails/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productDetail']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


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

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);


    /// sliders  routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders',  'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders', 'store');
        Route::get('/sliders/{id}/edit', 'edit');
        Route::put('/sliders/{id}', 'update');
        Route::get('/sliders/delete/{id}', 'delete');
    });
});