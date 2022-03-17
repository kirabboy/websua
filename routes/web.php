<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\CongThucController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PartnerController;

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
Route::get('/order', [HomeController::class, 'order']);

Route::get('/product-detail', [HomeController::class, 'product_detail']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/order-history', [HomeController::class, 'order_history']);
Route::resource('products',ProductController::class);

Route::get('/hoahong', [CongThucController::class, 'hoahong']);

Route::get('/setting-hoa-hong-truc-tiep', [SettingController::class, 'hoahongtructiep'])->name('setHoahongtructiep');
Route::post('/setting-hoa-hong-truc-tiep', [SettingController::class, 'postHoahongtructiep']);

Route::get('/setting-banner', [SettingController::class, 'uploadBanner'])->name('setBannerAds');
Route::get('/setting-banner', [SettingController::class, 'postBanner']);

Route::get('/promotion', [HomeController::class, 'promotion']);
Route::resource('products',ProductController::class);


Route::get('/lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

//Doi Nhom Controllers
Route::get('/list-partner', [PartnerController::class, 'list_partner']);


