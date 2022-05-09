<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use App\Models\Promotion;
use App\Models\PromotionHistory;
use App\Models\User;

class PromotionController extends Controller
{
    public function promotion()
    {
        $point= Promotion::where('points','>',0)->latest()->get();
        $diem_user = Point::find(auth()->user()->id);
        $history = PromotionHistory::where('user_id',auth()->user()->id)->get();
        return view('promotion', ['points' => $point, 'diem_user' => $diem_user,'history' => $history]);
    }

    public function postPromotion($point) {
        return redirect()->back();
        $user = User::where('id', auth()->user()->id)->with('getChild.getPoint')->first();
        $doanhso_user = Point::find(auth()->user()->id);
        $type_promo = Promotion::where('points',$point)->first();
        $history = PromotionHistory::where('user_id', auth()->user()->id)->get();
        $check_history = $history->where('promotion_id', $type_promo->id);
        
        $list_child_du_dieu_kien = [];
        foreach($user->getChild as $value){
            $doanhso_doinhom = $value->getPoint->doanhso + 
                $value->getPoint->doanhso_canhan;
            if ($doanhso_doinhom >= $type_promo->points && 
                $value->promo_xemay == 0 ) {
                $list_child_du_dieu_kien[] = $value;
            }
        }
        
        // Dieu kien đổi xe máy phải đủ  2 user có 400tr điểm
        if (count($list_child_du_dieu_kien) >= 2 && 
            $user->promo_xemay < 2 && $type_promo->id == 1) {
            foreach ($list_child_du_dieu_kien as $do_work) {
                $this->tru_diem_doanh_so_nhom($do_work->id, $type_promo->points);
                $do_work->promo_xemay += 1;
                $do_work->save();
            }
        } 
        // Dieu kien đổi xe máy phải đủ  4 user có 3000tr điểm
        else if (count($list_child_du_dieu_kien) >= 4 && 
            $user->promo_xehoi == 0 && $type_promo->id == 2) {
                dd(2);
        }
        dd('end');

        // if($diem_user->point >= $point) {
        //     $type_promo = Promotion::where('points',$point)->first();
        //     $check_history = PromotionHistory::where('user_id', auth()->user()->id)->get();
        //     $check_history = $check_history->where('promotion_id', $type_promo->id)->count();
        //     if($check_history < 2) {
        //         $this->tru_diem_doanh_so_nhom(auth()->user()->id, $type_promo->points);
        //     }
        //     dd($check_history);
            
        //     return redirect()->back();
        // } else {
        //     return redirect()->back()->with('Khong du diem de doi phan thuong nay');
        // }
    }

    public function tru_diem_doanh_so_nhom ($id, $amount) {
        $user = User::where('id', $id)->with('getChild.getPoint')->first();
        $user_doanhso_nhom = Point::where('id', $id)->first();
        $user_doanhso_nhom->doanhso == $amount - $user_doanhso_nhom->doanhso;
        
        
        dd($user_doanhso_nhom);
        self::tru_diem_doanh_so_nhom($id, $amount);
    }
}