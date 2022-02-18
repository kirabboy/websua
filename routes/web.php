<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('/login', [HomeController::class, 'getLogin']);
Route::get('/forgot-password', [HomeController::class, 'getForgotpw']);
Route::get('/register', [HomeController::class, 'getRegister']);
Route::get('/profile', [HomeController::class, 'getProfile']);
Route::get('/transactions', [HomeController::class, 'getTransactions']);
Route::get('/statistic', [HomeController::class, 'getStatistic']);