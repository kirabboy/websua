<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Province;
use App\Models\Order_products;
use Illuminate\Http\Request;

use Cart;
class CheckOutController extends Controller
{
    //
    public function index(){
      $carts= Cart::content();
      $total=Cart::total();
      $subtotal=Cart::subtotal();
      $province = Province::select('matinhthanh', 'tentinhthanh')->get();
      return view('checkout.index',compact('carts','total','subtotal','province'));
    }
    public function addOrder(Request $request){
       $order=Order::create($request->all());

       $carts=Cart::content();
       foreach ($carts as $cart){
         $data=[
          'id_order'=> $order->id,
          'id_product'=> $cart->id,
          'qty'=>$cart->qty,
          'amount'=>$cart->price,
          'total' =>$cart->price*$cart->qty,

         ];
         Order_products::create($data);
       }
       Cart::destroy();
       return "Thanh toán thành công";
    }
}
