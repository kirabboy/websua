<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Trungtampp;
use App\Models\Order_products;
use App\Models\Status_product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function list_partner()
    {
        $user = User::where('id',auth()->user()->id)->with('getChild','getPoint')->first();
        $user_id = $user->id;
        $listChild = [];
        $this->getAllChild($listChild, $user_id);
        $listChild = collect($listChild)->sortBy('id');
        
        return view('doitac.list-partner', compact('listChild'));
    }

    public function getAllChild(&$listChild = [], $id) {
        $user = User::where('id',$id)->with('getChild','getPoint')->first();
        $user_child = $user->getChild;
        if($user_child->count() > 0) {
            foreach($user_child as $value) {
                $child = User::where('id',$value->id)->with('getChild','getPoint')->first();
                $listChild[] = $child;
                self::getAllChild($listChild, $value->id);
            }
        }
    }
    
    public function getSales_manager(){
        $trungtam_phanphoi = Trungtampp::where('user_id',auth()->user()->id)->get();
        $listOrders = [];
        foreach($trungtam_phanphoi as $value) {
            $id_trungtam = $value->id;
            $order = Order::where('trungtam_pp', $id_trungtam)->get();
            foreach($order as $value_order) {
                $listOrders[] = $value_order;
            }
        }
        
        $get_products = Order_products::with('get_products')->get();
        $status = Status_product::all();
        foreach ($listOrders as $value) {
            $sum = 0;
            $money = $value->order_products;
            foreach ($money as $k) {
                $sum = $sum + $k->total;
            }
            $value->test = $sum;
        }
        return view('system.sales_manager', compact('listOrders','get_products','status'));
    }
}