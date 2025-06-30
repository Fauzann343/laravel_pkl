<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
//wajib login
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
//dibaawah ini akan di isi oleh route lainnya
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);

});
