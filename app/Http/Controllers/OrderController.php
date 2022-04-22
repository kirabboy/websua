<?php

namespace App\Http\Controllers;

use App\Models\Status_product;
use App\Models\Order_products;
use App\Models\Order;
use App\Models\Province;
use App\Models\Prodcut;
use App\Models\District;
use App\Models\Ward;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;


class OrderController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $district = District::all();
        $user = User::all();
        $ward = Ward::all();
        $get_products = Order_products::with('get_products')->get();
        $orders = Order::with('order_products')->orderBy('id', 'DESC')->get();
        $total = 0;
        $status = Status_product::all();
        
        foreach ($orders as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        return view('products.admin-history', compact('orders', 'province', 'district', 'ward', 'get_products', 'total', 'status'));
    }
    
    public function edit($id)
    {
        $order = Order::find($id);
        return response()->json([
            'status' => 200,
            'order' => $order,
        ]);
    } 

    public function update(Request $request)
    {
        $order = Order::with('order_products')->get();
        foreach ($order as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        $od_id = $request->input('od_id');
        $orders = Order::find($od_id);
        // $orders->full_name = $request->input('full_name');
        $orders->status = $request->input('status');
        if ($orders->status == 2) {
            
            $id_trungtam_pp = $orders->trungtam_pp;
            $ct = new CongThucController;
            $ct->hoahongtructiep($orders->users_id, $sum, 2, $orders);
        }
        // dd( $orders);
        $orders->update();
        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }
    public function order_his()
    {
        $orders = Order::with('order_products')->orderBy('id', 'DESC')->get();
        $province = Province::all();
        $district = District::all();
        // $ward = Ward::all();
        $get_products = Order_products::with('get_products')->get();
        $total = 0;
        $status = Status_product::all();
        $user = User::all();
        $ward = Ward::all();

        foreach ($orders as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        return view('products.order-history', compact('orders', 'user', 'province', 'district', 'ward', 'get_products', 'total', 'status'));
    }
    public function test($id)
    {
        $test2 = Order::where('id', $id)->with('order_products')->first();
    }
    public function sortBy($clname)
    {
        dd('heiu');
    }
}
