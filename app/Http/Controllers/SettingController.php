<?php


namespace App\Http\Controllers;

use App\Models\SettingHoaHong;
use App\Models\Province;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function hoahongtructiep() {
        $setting = SettingHoaHong::first();
        return view('setting.hoahongtructiep', compact('setting'));
    }
 
    public function postHoahongtructiep(Request $request) {
        $setting = SettingHoaHong::first();
        $setting->moc0 = $request->moc0;
        $setting->moc1 = $request->moc1;
        $setting->moc2 = $request->moc2;
        $setting->moc3 = $request->moc3;
        $setting->hoahong1 = $request->hoahong1;
        $setting->hoahong2 = $request->hoahong2;
        $setting->hoahong3 = $request->hoahong3;
        $setting->save();
        
        return redirect()->back();
    }

    public function uploadBanner () {
        return view('setting.bannerAds');
    }

    public function test($id) {
        $product = Product::where('id', $id)->first();

        dd($product);
        return view('test');
    }
}