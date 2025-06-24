<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MyController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);
Route::get('/about', [FrontController::class, 'about']);
Route::get('/product', [FrontController::class, 'product']);
Route::get('/cart', [FrontController::class, 'cart']);

Route::get('barang/{barang?}/{kode?}', function ($barang = null, $kode = null) {
    return view('barang', compact('barang', 'kode'));
});

Route::get('siswa', [MyController::class, 'index']);
route::post('/siswa', [MyController::class, 'store']);

Route::get('siswa/{create}', [MyController::class, 'create']);
Route::get('siswa/{id}', [MyController::class, 'show']);

//edit daata
Route::get('siswa/{id}/edit', [MyController::class, 'edit']);

route::put('siswa/{id}', [MyController::class, 'update']);
route::delete('siswa/{id}', [MyController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);

    route::resource('/category', CategoryController::class);
    route::resource('/product', ProductController::class);

});
