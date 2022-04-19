<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Banner;
use App\Models\Point;
use App\Models\Product;

class HomeController extends Controller
{
    public function getHome(){
        $user = User::with('getPoint')->where('id', auth()->user()->id)->first();
        return view('user.index', compact('user'));
    }
    //
    public function document()
    {
        $banner = Banner::all();
        return view('document', compact('banner'));
    }
    
    public function order()
    { 
        $products =Product::where('price','>',0)->latest()->get();
        return view('products.order', ['product' => $products]);
    }

    public function promotion()
    {
        $point= DB::table('promotion')->where('points','>',0)->latest()->get();
        $diem_user = Point::find(auth()->user()->id);
        return view('promotion', ['points' => $point, 'diem_user' => $diem_user]);
    }

    public function order_history()
    {
        return view('products.order-history');
    }

    public function product_detail()
    {
        return view('products.product-detail');
    }
    
    public function cart()
    {
        return view('products.cart');
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
    public function getList_manager(){
        return view('system.list_manager');
    }
}
