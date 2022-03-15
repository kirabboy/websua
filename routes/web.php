<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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