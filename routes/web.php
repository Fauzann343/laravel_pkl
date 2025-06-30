<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;



//route guest "tamu"/member
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])
    ->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])
    ->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about', [FrontendController::class, 'about']);
// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
// orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// review
Route::post('/product/{product}/review', [\App\Http\Controllers\ReviewController::class, 'store'])
    ->middleware('auth')->name('review.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin / Backend
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
    // crud
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', OrderController::class);
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

});
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::post('/product', [ProductController::class, 'store'])->name('product.store');

