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
Route::get('/order', [HomeController::class, 'order']);
Route::get('/list-partner', [HomeController::class, 'list_partner']);
Route::get('/product-detail', [HomeController::class, 'product_detail']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/order-history', [HomeController::class, 'order_history']);
Route::get('/promotion', [HomeController::class, 'promotion']);
Route::resource('products',ProductController::class);
Route::get('lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);
Route::get('lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);