<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\SettingHoaHong;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongThucController extends Controller
{
    public function hoahong() {
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        $id = auth()->user()->id;
        // $this->hoahongdoinhom($id);
        // $this->hoahongtructiep(4, 10000, 2);
        return view('hoahong',compact('province'));
    }

    public function hoahongtructiep($id, $amount, $count) {
        $user = User::where('id', $id)->with('getParent','getPoint')->first();
        $id_dad = $user->getParent;
        
        if($id_dad != null){
            $doanhso = $id_dad->getPoint->doanhso;
            $point = $id_dad->getPoint->point;
            $setting = SettingHoaHong::first();
            $doanhso += $amount;
            
            if($count == 2) {
                if($amount >= $setting->moc0 && $amount < $setting->moc1) {
                    $point += $amount * $setting->hoahong1;
                } else if($amount >= $setting->moc1 && $amount < $setting->moc2) {
                    $point += $amount * $setting->hoahong2;
                } else if($amount >= $setting->moc2 && $amount < $setting->moc3) {
                    $point += $amount * $setting->moc3;
                }
            } elseif ($count == 1) {
                $point += $amount*0.03;
            } elseif ($count == 0) {
                $point += $amount*0.02;
            }

            $id_dad->getPoint->point = $point;
            $id_dad->getPoint->doanhso = $doanhso;
            $id_dad->getPoint->save();
            
            $count -= 1;
            if($count > 0) {
                self::hoahongtructiep($id_dad->id, $amount, $count);
            }
        }
    }

    // public function hoahongdoinhom($id) {
    //     $user = User::find($id)->with('getChild','getPoint')->first();
    //     $user_child = $user->getChild;
        
    //     $listChild = [];
    //     (new PartnerController)->getAllChild($listChild, $user->id);

    //     $sum = 0;
    //     foreach ($user_child as $value) {
    //         $child = User::find($value->id)->with('getChild','getPoint')->first();
    //         dd($child);
    //         $point_child = $value->getPoint->point;
    //         $sum += $point_child;
    //     }
    //     dd($listChild);
    // }

}