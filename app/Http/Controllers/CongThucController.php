<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Point;
use App\Models\SettingHoaHong;
use App\Models\DoanhSoThang;
use App\Models\HistoryChuyendiem;
use App\Models\Trungtampp;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongThucController extends Controller
{
    public function hoahong() {
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        $id = auth()->user()->id;
        return view('hoahong',compact('province'));
    }

    public function hoahongtructiep($id, $amount, $count, $orders) {
        $user = User::where('id', $id)->with('getParent','getPoint')->first();
        $doanh_so_tuan = DoanhSoThang::where('user_id', $user->id)->first();
        
        if($count == 2) {
            $point_user = $user->getPoint;
            $point_user->doanhso_canhan += $amount;
            $point_user->save();

            $doanh_so_tuan->doanhso_canhan += $amount;
            $doanh_so_tuan->save();
        }

        $user = User::where('id', $id)->with('getParent','getPoint')->first();
        $id_dad = $user->getParent;
        
        if($id_dad != null){
            $doanhso = $id_dad->getPoint->doanhso;
            $point = 0;
            $setting = SettingHoaHong::first();
            $id_trungtam_pp = Trungtampp::where('id',$orders->trungtam_pp)->first()->user_id;
            $point_user_chuyendiem = Point::where('id', $id_trungtam_pp)->first();
            
            if($count == 2) {
                if($amount >= $setting->moc0 && $amount < $setting->moc1) {
                    $point += $amount * $setting->hoahong1;
                } else if($amount >= $setting->moc1 && $amount < $setting->moc2) {
                    $point += $amount * $setting->hoahong2;
                } else if($amount >= $setting->moc2 && $amount < $setting->moc3) {
                    $point += $amount * $setting->moc3;
                }
            } elseif ($count == 1) {
                if($amount >= $setting->moc0) {
                    $point += $amount*0.03;
                }
            } elseif ($count == 0) {
                if($amount >= $setting->moc0) {
                    $point += $amount*0.02;
                }
            }
            
            $diem_father = $id_dad->getPoint;
            if($point_user_chuyendiem != $id_dad->getPoint){
                $point_user_chuyendiem->point -= $point;
                $point_user_chuyendiem->save();
                $diem_father->point += $point;
            }
            $diem_father->doanhso += $amount;
            $diem_father->save();
            
            $doanhso_tuan_id_dad = DoanhSoThang::where('user_id', $id_dad->id)->first();
            $doanhso_tuan_id_dad->point += $point;
            $doanhso_tuan_id_dad->doanhso += $amount;
            
            $lichsu_chuyendiem_hoahong = new HistoryChuyendiem;
            $lichsu_chuyendiem_hoahong->point = $point;
            $lichsu_chuyendiem_hoahong->user_id = $id_dad->id;
            $lichsu_chuyendiem_hoahong->id_chuyen = auth()->user()->id;
            $lichsu_chuyendiem_hoahong->note = 'Nhận thưởng hoa hồng '.number_format($point).' điểm';
            
            $doanh_so_tuan->save();
            $doanhso_tuan_id_dad->save();
            
            if ($amount >= $setting->moc0) {
                $lichsu_chuyendiem_hoahong->save();
            }
            $count -= 1;
            
            if($count >= 0) {
                self::hoahongtructiep($id_dad->id, $amount, $count, $orders);
            } else {
                $this->congDoanhSoNhom($id_dad->id_dad, $amount);
            }
        }
    }
    
    public function congDoanhSoNhom($id, $amount) {
        $user = User::where('id', $id)->with('getParent','getPoint')->first();
        $doanh_so_tuan = DoanhSoThang::where('user_id', $user->id)->first();
        $doanh_so_tuan->doanhso += $amount;
        $doanh_so_tuan->save();

        $id_dad = $user->getParent;
        
        $diem_father = $user->getPoint;
        $diem_father->doanhso += $amount;
        $diem_father->save();
        
        if($id_dad != null) {
            self::congDoanhSoNhom($id_dad->id, $amount);
        }
    }

    public function test() {
        $id = auth()->user()->id;
        $this->hoahongtructiep($id, 10000, 2);
        return view('test');
    }
}