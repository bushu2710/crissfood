<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class,'index'])->name('productList');

Route::group([ 'middleware' => ['auth:api']], function() {

    Route::post('/addToCart', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add-to-cart');

    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

});


