<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\shippingConfig;
use App\Admin\Controllers\ConfigShippingController;

class ShippingController extends Controller
{
    public function test(){
        return optional(District::where('maquanhuyen', 7110)->first(), function ($user) {
            return $user->ward()->select('maphuongxa', 'tenphuongxa')->get();
        });
    }
    // lấy quận huyện theo tỉnh thành
    public function districtOfProvince(Request $request){
        return optional(Province::where('matinhthanh', $request->id)->first(), function ($response) {
            return $response->district()->select('maquanhuyen', 'tenquanhuyen')->get();
        });
    }
    // lấy phường xã theo quận huyện
    public function wardOfDistrict(Request $request){
        return optional(District::where('maquanhuyen', $request->id)->first(), function ($response) {
            return $response->ward()->select('maphuongxa', 'tenphuongxa')->get();
        });
    }
}