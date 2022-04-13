<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Province;
use App\Models\Order_products;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Controllers\CongThucController;
use Cart;

class CheckOutController extends Controller
{
  //

  public function index()
  {
    $id = auth()->user()->id;
    $carts = Cart::content();
    $total = Cart::total();
    $subtotal = Cart::subtotal();


    $province = Province::select('matinhthanh', 'tentinhthanh')->get();
    return view('checkout.index', compact('carts', 'total', 'subtotal', 'province'));
  }
  public function addOrder(Request $request)
  {
    $ct = new CongThucController;
    $id = auth()->user()->id;
    $hd = new Order();
    $hd->users_id = $id;
    $hd->full_name = $request->full_name;
    $hd->sel_province = $request->sel_province;
    //  $hd->subtotal=$request->subtotal;
    //  $hd->total=$request->total;
    $hd->sel_ward = $request->sel_ward;
    $hd->sel_district = $request->sel_district;
    $hd->street_address = $request->street_address;
    $hd->save();
    //  dd($hd);
    $total = Cart::total();
    $ct->hoahongtructiep($id, $total, 2);
    // $order = Order::create($request->all());
    $carts = Cart::content();
    foreach ($carts as $cart) {
      $data = [
        'id_order' => $hd->id,
        'id_product' => $cart->id,
        'qty' => $cart->qty,
        'amount' => $cart->price,
        'total' => $cart->price * $cart->qty,



      ];

      Order_products::create($data);
    }
    Cart::destroy();
    if ( auth()->user()->level==1){
      return redirect('/lich-su')->with('message', 'Thanh toán thành công!');
    }
    return redirect('/lich-su-dat-hang')->with('message', 'Thanh toán thành công!');
   
  }
}
