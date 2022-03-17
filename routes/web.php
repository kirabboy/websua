<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CongThucController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingController;
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


Route::post('/login', [UserController::class, 'checkLogin']);
Route::post('/register', [UserController::class, 'checkRegister']);

Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/login', [UserController::class, 'getLogin'])->name('login');
    Route::get('/forgot-password', [UserController::class, 'getForgotpw']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user-management', [AdminController::class, 'getUserManagement']);
    });

    Route::get('/logout', [UserController::class, 'getLogout']);
    Route::get('/register', [UserController::class, 'getRegister']);
    Route::get('/support', [HomeController::class, 'getSupport']);
    Route::get('/distribution', [HomeController::class, 'getDistribution']);
    Route::get('/statistic', [HomeController::class, 'getStatistic']);
    Route::get('/transactions', [HomeController::class, 'getTransactions']);
    Route::get('/profile', [HomeController::class, 'getProfile'])->name('profile');
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/document', [HomeController::class, 'document']);
    Route::get('/order', [HomeController::class, 'products']);
    Route::get('/list-partner', [HomeController::class, 'list_partner']);
    Route::get('/product-detail', [HomeController::class, 'product_detail']);
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/order-history', [HomeController::class, 'order_history']);
    Route::resource('products', ProductController::class);
    Route::get('/document', [HomeController::class, 'document']);
    Route::get('/order', [HomeController::class, 'order']);
    Route::get('/list-partner', [HomeController::class, 'list_partner']);
    Route::get('/product-detail', [HomeController::class, 'product_detail']);
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/order-history', [HomeController::class, 'order_history']);
    Route::resource('products', ProductController::class);

    Route::get('/hoahong', [CongThucController::class, 'hoahong']);

    Route::get('/setting-hoa-hong-truc-tiep', [SettingController::class, 'hoahongtructiep'])->name('setHoahongtructiep');
    Route::post('/setting-hoa-hong-truc-tiep', [SettingController::class, 'postHoahongtructiep']);

    Route::get('/setting-banner', [SettingController::class, 'uploadBanner'])->name('setBannerAds');
    Route::get('/setting-banner', [SettingController::class, 'postBanner']);

    Route::get('/promotion', [HomeController::class, 'promotion']);
    Route::resource('products', ProductController::class);


    Route::get('/lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

    Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);
});
