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
use App\Models\Point;
use App\Models\Trungtampp;
use Illuminate\Http\Request;
use Cart;
use Mail;

class OrderController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $district = District::all();
        $user = User::all();
        $ward = Ward::all();
        $get_products = Order_products::with('get_products')->get();
        $total = 0;
        $status = Status_product::all();
        
        if (auth()->user()->level == 1 || auth()->user()->level == 2) {
            $id_trung_tam_pp = Trungtampp::where('user_id', auth()->user()->id)->get();
            $order = Order::with('order_products','getTrungTamPP')->orderBy('id', 'DESC')->get();
            $orders = [];
            foreach ($id_trung_tam_pp as $value) {
                foreach ($order as $data) {
                    if($value->id == $data->trungtam_pp) {
                        $orders[] = $data;
                    }
                }
            }
        }
        
        foreach ($orders as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        return view('products.admin-history', compact(
            'orders', 'province', 'district', 
            'ward', 'get_products', 'total', 
            'status'));
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
        $od_id = $request->od_id;
        $orders = Order::find($od_id);

        $total = Order_products::where('id_order', $od_id)->get();

        $sum = 0;
        foreach ($total as $value) {
            $sum += $value->total;
        }
        
        $orders->status = $request->status;
        if ($orders->status == 2) {
            $id_trungtam_pp = $orders->trungtam_pp;
            $user_trungtam_pp = Trungtampp::where('id', $id_trungtam_pp)->first()->user_id;
            $point_cua_trung_tam_pp = Point::where('user_id',$user_trungtam_pp)->first()->point;
            
            if($point_cua_trung_tam_pp >= $sum*0.16) {
                $check_level_user = User::where('id', $orders->users_id)->first();
                if($check_level_user->level == 3) {
                    $phanvaitro = new SignupController;
                    $phanvaitro->phanvaitro($check_level_user->id, 2);
                    $check_level_user->level = 2;
                    $check_level_user->save();
                }
                
                $ct = new CongThucController;
                $ct->hoahongtructiep($orders->users_id, $sum, 2, $orders);

                //----- Gửi email -----//
                $congratulation = 'Web Sữa';
                Mail::send('email.dat-hang-thanh-cong', compact('congratulation'),
                 function($email) use($congratulation) {
                    $email->subject('Đặt hàng thành công');
                    $email->to('thinhnguyen01165@gmail.com', $congratulation);
                });
            } else {
                return redirect()->back()->with('error','Số điểm của bạn không đủ để chuyển cho user');
            }
        }
        $orders->update();
        return redirect()->back()
            ->with('message', 'Đã hoàn thành đơn hàng. Điểm thưởng đã được chuyển cho người đặt hàng!');
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
}
