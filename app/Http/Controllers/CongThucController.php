<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SettingHoaHong;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongThucController extends Controller
{
    public function hoahong() {
        //$this->hoahongtructiep(4,1000000,2);
        // $this->gift();
        return view('hoahong');
    }

    public function hoahongtructiep($id, $amount, $count) {
        $user = User::where('id', $id)->with('getParent','getPoint')->first();
        $id_dad = $user->getParent;

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