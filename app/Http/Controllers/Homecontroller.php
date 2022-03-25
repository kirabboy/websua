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
    public function getHome(){
        return view('user.index');
    }
    public function getProfile(){
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        $quanhuyen = District::select('maquanhuyen', 'tenquanhuyen')->get();
        $phuongxa = Ward::select('maphuongxa', 'tenphuongxa')->get();

        return view('user.profile',compact('province','quanhuyen','phuongxa'));
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
