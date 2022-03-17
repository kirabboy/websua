<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }
    public function document()
    {
        return view('document');
    }
    public function order()
    { $products = DB::table('products')->where('price','>',0)->latest()->get();
        return view('order', ['product' => $products]);
    }
    public function promotion()
    {$point= DB::table('promotion')->where('points','>',0)->latest()->get();
        return view('promotion', ['points' => $point]);
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
        return view(' product-detail');
    }
    public function cart()
    {
        return view('cart');
    }
    public function index(){
       
    }
}