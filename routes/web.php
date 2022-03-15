<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Users\UserController;
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

// Route::get('/', function () {
//     return view('user.index');
// });

Route::get('/', [HomeController::class, 'getHome']);
Route::get('/forgot-password', [HomeController::class, 'getForgotpw']);
Route::get('/profile', [HomeController::class, 'getProfile'])->name('profile');
Route::get('/transactions', [HomeController::class, 'getTransactions']);
Route::get('/statistic', [HomeController::class, 'getStatistic']);
Route::get('/distribution', [HomeController::class, 'getDistribution']);
Route::get('/support', [HomeController::class, 'getSupport']);

Route::get('/login', [UserController::class, 'getLogin']);
Route::post('/login', [UserController::class, 'checkLogin']);
Route::get('/logout', [UserController::class, 'getLogout']);
Route::get('/register', [UserController::class, 'getRegister']);
Route::post('/register', [UserController::class, 'checkRegister']);
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
