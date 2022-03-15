<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
    return view('user.index');
});
Route::get('/document', [HomeController::class, 'document']);
Route::get('/order', [HomeController::class, 'products']);
Route::get('/list-partner', [HomeController::class, 'list_partner']);
Route::get('/product-detail', [HomeController::class, 'product_detail']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/order-history', [HomeController::class, 'order_history']);
Route::resource('products',ProductController::class);