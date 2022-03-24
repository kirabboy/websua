<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use App\Models\Promotion;
use App\Models\PromotionHistory;

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
        $diem_user = Point::find(auth()->user()->id);
        if($diem_user->point >= $point) {
            $type_promo = Promotion::where('points',$point)->first();
            $check_history = PromotionHistory::where('user_id', auth()->user()->id)->get();
            $check_history = $check_history->where('promotion_id', $type_promo->id)->count();
            
            if($check_history < 2) {
                $history = new PromotionHistory;
                $history->user_id = auth()->user()->id;
                $history->promotion_id = $type_promo->id;
                $history->save();

                $diem_user->point -= $point;
                $diem_user->save();
            }
            
            return redirect()->back();
        } else {
            return redirect()->back()->with('Khong du diem de doi phan thuong nay');
        }
        
    }
}