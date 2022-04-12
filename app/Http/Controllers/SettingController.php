<?php


namespace App\Http\Controllers;

use App\Models\SettingHoaHong;
use App\Models\Product;
use App\Models\Banner;

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
        $setting->hoahong1 = $request->hoahong1/100;
        $setting->hoahong2 = $request->hoahong2/100;
        $setting->hoahong3 = $request->hoahong3/100;
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

    public function getBanner() {
        $banner = Banner::all();
        return view('setting.bannerAds', compact('banner'));
    }

    public function postBanner(Request $request) {
        $banner = new Banner();
        $banner->title = $request->title;

        if($request->hasFile('image')) {
            $file = $request->image;
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/banner');
            $file->move($destinationPath, $file_name);
            $banner->image = $file_name;
        }

        $banner->save();
        return redirect()->back();
    }

    public function deleteBanner($id) {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->back();
    }
}