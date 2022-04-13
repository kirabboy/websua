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
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\OrderController;

Route::post('/dang-nhap', [UserController::class, 'checkLogin']);
Route::post('/dang-ky', [UserController::class, 'checkRegister']);
Route::post('/doi-mat-khau/{id}', [UserController::class, 'changePassword']);
Route::post('/thong-tin-ca-nhan/{id}', [UserController::class, 'changeProfile']);
Route::post('/dang-ki', [SignupController::class, 'checkRegister']);
Route::post('/quan-ly-nguoi-dung/{id}', [AdminController::class, 'changeUser']);
Route::post('/quan-ly-nguoi-dung/doi-mat-khau/{id}', [AdminController::class, 'changePassword']);

Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/dang-nhap', [UserController::class, 'getLogin'])->name('dangnhap');
    Route::get('/forgot-password', [UserController::class, 'getForgotpw']);
    Route::get('/dang-ki', [SignupController::class, 'getRegister']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/quan-ly-nguoi-dung', [AdminController::class, 'getUserManagement']);
        Route::get('/quan-ly-nguoi-dung/{id}', [AdminController::class, 'getUserChange']);
        Route::resource('san-pham', ProductController::class);
        Route::get('/lich-su-mua-hang', [HomeController::class, 'getStatistic']);
        Route::get('/setting-hoa-hong-truc-tiep', [SettingController::class, 'hoahongtructiep'])->name('setHoahongtructiep');
        Route::post('/setting-hoa-hong-truc-tiep', [SettingController::class, 'postHoahongtructiep']);
        Route::get('/setting-banner', [SettingController::class, 'getBanner'])->name('setBannerAds');
        Route::post('/setting-banner', [SettingController::class, 'postBanner']);
        Route::get('/setting-banner/delete/{id}', [SettingController::class, 'deleteBanner']);
        Route::get('lich-su', [OrderController::class, 'index']);
    });
  
    Route::group(['middleware' => ['role:congtacvien']], function () {
        Route::get('/lich-su-dat-hang', [OrderController::class, 'order_his']);
    });
    
    Route::group(['middleware' => ['role:admin|agent']], function () {
        Route::get('/dang-ky', [UserController::class, 'getRegister']);
    });
    Route::get('/dat-hang/{id}', [ShopController::class, 'show']);
    Route::get('/logout', [UserController::class, 'getLogout']);
    Route::get('/support', [HomeController::class, 'getSupport']);
    Route::get('/trung-tam-phan-phoi', [HomeController::class, 'getDistribution']);
    Route::get('/hoa-hong-duoc-huong', [HomeController::class, 'getTransactions']);
    Route::get('/thong-tin-ca-nhan', [UserController::class, 'getProfile'])->name('profile');
    // Route::get('/',function (){
    //     return \App\Models\User::find(1)->get_user_id;
    // });
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/tai-lieu', [HomeController::class, 'document']);
    // Route::get('/dat-hang', [HomeController::class, 'products']);
    Route::get('/danh-sach-doi-tac', [PartnerController::class, 'list_partner']);
    Route::get('/chi-tiet-san-pham', [HomeController::class, 'product_detail']);
    // Route::get('/gio-hang', [HomeController::class, 'cart']);

    Route::get('/dat-hang', [HomeController::class, 'order']);
    Route::resource('san-pham', ProductController::class);

    Route::get('edit_order/{id}', [OrderController::class, 'edit']);
    Route::put('update_order', [OrderController::class, 'update']);
    // Route::get('/lich-su-dat-hang', [OrderController::class, 'update'])->name('orders.update');
    Route::prefix('gio-hang')->group(
        function () {
            Route::get('add/{id}', [CartController::class, 'add']);
            Route::get('buynow/{id}', [CartController::class, 'buynow']);
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

    Route::get('/promotion', [PromotionController::class, 'promotion'])->name('promotion');
    Route::get('/promotion/{point}', [PromotionController::class, 'postPromotion']);

    Route::resource('products', ProductController::class);



    //Doi Nhom Controllers
    Route::get('/list-partner', [PartnerController::class, 'list_partner']);

    Route::get('/sales_manager', [HomeController::class, 'getSales_manager']);
    Route::get('/list_manager', [HomeController::class, 'getList_manager']);
});

Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);

Route::get('/lay-quan-huyen-theo-tinh-thanh', [ShippingController::class, 'districtOfProvince']);
Route::get('/lay-phuong-xa-theo-quan-huyen', [ShippingController::class, 'wardOfDistrict']);
