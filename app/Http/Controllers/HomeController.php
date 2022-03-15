<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Route;

class HomeController extends Controller
{
    //
    public function getHome(){
        return view('home');
    }
    public function getForgotpw(){
        return view('forgotpassword');
    }
    public function getProfile(){
        return view('profile');
    }
    public function getTransactions(){
        return view('transactions');
    }
    public function getStatistic(){
        return view('statistic');
    }
    public function getDistribution(){
        return view('distribution');
    }
    public function getSupport(){
        return view('support');
    }
}
