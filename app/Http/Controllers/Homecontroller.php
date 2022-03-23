<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Province;
use App\Models\Banner;

class HomeController extends Controller
{
    //
    public function document()
    {
        $banner = Banner::all();
        return view('document', compact('banner'));
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
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        return view('user.profile',compact('province'));
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
    public function getSales_manager(){
        return view('system.sales_manager');
    }
    public function getList_manager(){
        return view('system.list_manager');
    }
}
