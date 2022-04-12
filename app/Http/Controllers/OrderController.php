<?php

namespace App\Http\Controllers;

use App\Models\Status_product;
use App\Models\Order_products;
use App\Models\Order;
use App\Models\Province;
use App\Models\Prodcut;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('order_products')->get();

        // $allBooks = Book::all()->modelKeys();
        $province = Province::all();
        $district = District::all();
        $ward = Ward::all();
        $get_products = Order_products::with('get_products')->get();
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
        //dd($orders);
        return view('products.admin-history', compact('orders', 'province', 'district', 'ward', 'sum', 'get_products', 'total', 'status'));
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

          $od_id = $request->input('od_id');
          $orders=Order::find($od_id);
          $orders->full_name =$request->input('full_name');
          $orders->status =$request->input('status');
          $orders->update();
        // $orders->update($request->all());

        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }
    public function order_his()
    {
        $orders = Order::with('order_products')->get();

        // $allBooks = Book::all()->modelKeys();
        $province = Province::all();
        $district = District::all();
        $ward = Ward::all();
        $get_products = Order_products::with('get_products')->get();
        $total = 0;
        $status = Status_product::all();

        //   foreach ($get_products as $get_pd){
        //     // dd($orders);
        //     $total=$get_pd->a
        //   };

        // $id = Order::all() -> modelKeys();
        // // $id = Order::findOrFail($id);
        // dd($id);

        // // $id= $orders->id;
        // $test = Order_products::where('id',60)->with('status_product')->first();
        // dd($test);

        foreach ($orders as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        //dd($orders);
        return view('products.order-history', compact('orders', 'province', 'district', 'ward', 'sum', 'get_products', 'total', 'status'));
    }
    public function test($id)
    {
        $test2 = Order::where('id', $id)->with('order_products')->first();
    }

    // public function update(Request $request)
    // {
    //     if ($request->ajax()) {
    //         Order::find($request->pk)->update([
    //             $request->name => $request->value
    //         ]);
    //         return response()->json(['success' => true]);
    //     }
    // }
    // public function update(Request $request)
    // {
    //     if ($request->ajax()) {
    //         Order::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
    //         return response()->json(['success' => true]);
    //     }
    // }
}
