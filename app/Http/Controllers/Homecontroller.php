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
use App\Models\Promotion;
use App\Models\PromotionHistory;

class HomeController extends Controller
{
    public function getHome(){
        $user = User::with('getPoint')->where('id', auth()->user()->id)->first();
        $list_f1 = User::with('getPoint')->where('id_dad',auth()->user()->id)->get();
        $soluong_f1 = $list_f1->count();
        
        $list_doanhso = [];
        $so_nhom_du_dieu_kien_doi_thuong = 0;
        foreach($list_f1 as $value) {
            $doanhso_group_f1 = $value->getPoint;
            if($doanhso_group_f1->doanhso > 400000000) {
                $so_nhom_du_dieu_kien_doi_thuong += 1;
            }
            $list_doanhso[] = $doanhso_group_f1;
        }

        $points= Promotion::where('points','>',0)->latest()->get();
        $diem_user = Point::find(auth()->user()->id);
        $history = PromotionHistory::where('user_id',auth()->user()->id)->get();

        return view('user.index', compact(
            'user', 
            'soluong_f1',
            'so_nhom_du_dieu_kien_doi_thuong',
            'points',
            'diem_user',
            'history'
        ));
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
