<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\SettingHoaHong;
use App\Models\DoanhSoThang;
use Carbon\Carbon;

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
        $doanh_so_tuan = DoanhSoThang::where('user_id', $user->id)->first();
        
        if($count == 2) {
            $point_user = $user->getPoint;
            $point_user->doanhso_canhan += $amount;
            $point_user->doanhso += $amount;
            $point_user->save();
        }

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
    
    public function test() {
        $id = auth()->user()->id;
        $this->hoahongtructiep($id, 10000, 2);
        return view('test');
    }


    // public function test() {
    //     $id = auth()->user()->id;
    //     $user = User::with('getPoint')->get();
        
    //     //$this->hoahongtructiep(4, 10000, 2);
    //     foreach ($user as $value) {
    //         $doanhso_tuan_truoc = DoanhSoThang::where('user_id', $id)->orderBy('id', 'desc')->first();
    //         $doanhso = new DoanhSoThang;
            
    //         $doanhso->doanhso = $value->getPoint->doanhso - $doanhso_tuan_truoc->doanhso;
    //         $doanhso->point = $value->getPoint->point - $doanhso_tuan_truoc->point;
    //         $doanhso->doanhso_canhan = $value->getPoint->doanhso_canhan - $doanhso_tuan_truoc->doanhso_canhan;
    //         $doanhso->user_id = $value->id;
    //         // $doanhso->save();
            
    //         // $value->getPoint->save();
            
    //     }
    //     return view('test');
    // }
}