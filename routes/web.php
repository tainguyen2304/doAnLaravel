<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

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


    /// colors  routes
    Route::controller(App\Http\Controllers\Admin\ColorsController::class)->group(function () {
        Route::get('/colors',  'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{id}/edit', 'edit');
        Route::put('/colors/{id}', 'update');
        Route::get('/colors/delete/{id}', 'delete');
    });
});