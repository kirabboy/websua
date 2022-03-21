<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function document()
    {
        return view('document');
    }
    
    public function order()
    { 
        $products = DB::table('products')->where('price','>',0)->latest()->get();
        return view('order', ['product' => $products]);
    }

    public function promotion()
    {
        $point= DB::table('promotion')->where('points','>',0)->latest()->get();
        return view('promotion', ['points' => $point]);
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
        $user = User::find(auth()->user())->fist();
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
