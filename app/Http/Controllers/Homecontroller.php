<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function document()
    {
        return view('document');
    }
    public function products()
    {
        return view('products');
    }
    public function list_partner()
    {
        return view('list-partner');
    }

    public function order_history()
    {
        return view('order-history');
    }

    public function product_detail()
    {
        return view('product-detail');
    }
    public function cart()
    {
        return view('cart');
    }
    public function getHome(){
        return view('user.index');
    }
    public function getProfile(){
        return view('user.profile');
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
