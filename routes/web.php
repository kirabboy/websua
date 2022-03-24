<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CongThucController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;

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
    Route::get('/dat-hang/{id}', [ShopController::class, 'show']);
    Route::get('/logout', [UserController::class, 'getLogout']);
    Route::get('/register', [UserController::class, 'getRegister']);
    Route::get('/support', [HomeController::class, 'getSupport']);
    Route::get('/distribution', [HomeController::class, 'getDistribution']);
    Route::get('/statistic', [HomeController::class, 'getStatistic']);
    Route::get('/transactions', [HomeController::class, 'getTransactions']);
    Route::get('/profile', [HomeController::class, 'getProfile'])->name('profile');
    // Route::get('/',function (){
    //     return \App\Models\Product::find(10)->product_brand;
    // });
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/tai-lieu', [HomeController::class, 'document']);
    // Route::get('/dat-hang', [HomeController::class, 'products']);
    Route::get('/danh-sach-doi-tac', [HomeController::class, 'list_partner']);
    Route::get('/chi-tiet-san-pham', [HomeController::class, 'product_detail']);
    // Route::get('/gio-hang', [HomeController::class, 'cart']);
    Route::get('/lich-su-dat-hang', [HomeController::class, 'order_history']);
    Route::get('/dat-hang', [HomeController::class, 'order']);
    Route::resource('san-pham', ProductController::class);
    Route::prefix('gio-hang')->group(
        function () {
            Route::get('add/{id}', [CartController::class, 'add']);
            Route::get('/', [CartController::class, 'index']);
            Route::get('delete/{rowId}', [CartController::class, 'delete']);
            Route::get('destroy', [CartController::class, 'destroy']);
            Route::get('/update', [CartController::class, 'update']);
        }
    );
    Route::prefix('thanh-toan')->group(
        function () {
            Route::get('/', [CheckOutController::class, 'index']);
            Route::post('/', [CheckOutController::class, 'addOrder']);
        }
    );
    // Route::get('t',function(){
    //     Cart::add('293ad','Product 1', 1, 9.99, 550, ['size' => 'large']);
    // });
    // Route::get('test',function(){
    //     return Cart::content();
    // });
    // Route::resource('san-pham', ProductController::class);
    // Route::get('/document', [HomeController::class, 'document']);

    // Route::get('/list-partner', [HomeController::class, 'list_partner']);
    // Route::get('/product-detail', [HomeController::class, 'product_detail']);
    // Route::get('/cart', [HomeController::class, 'cart']);
    // Route::get('/order-history', [HomeController::class, 'order_history']);


    Route::get('/hoahong', [CongThucController::class, 'hoahong']);

    Route::get('/setting-hoa-hong-truc-tiep', [SettingController::class, 'hoahongtructiep'])->name('setHoahongtructiep');
    Route::post('/setting-hoa-hong-truc-tiep', [SettingController::class, 'postHoahongtructiep']);

    Route::get('/setting-banner', [SettingController::class, 'getBanner'])->name('setBannerAds');
    Route::post('/setting-banner', [SettingController::class, 'postBanner']);
    Route::get('/setting-banner/delete/{id}', [SettingController::class, 'deleteBanner']);

    Route::get('/promotion', [PromotionController::class, 'promotion'])->name('promotion');
    Route::get('/promotion/{point}', [PromotionController::class, 'postPromotion']);
    
    Route::resource('products', ProductController::class);


    Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

    //Doi Nhom Controllers
    Route::get('/list-partner', [PartnerController::class, 'list_partner']);
    Route::get('/lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);

    Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);
});
