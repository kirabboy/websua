<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Banner;
use App\Models\Point;
use App\Models\Product;
use App\Models\HistoryNapdiem;
use App\Models\HistoryChuyendiem;

class PointController extends Controller
{
    public function napDiem() {
        $point_admin = Point::where('user_id', 1)->first()->point;
        $lichsu_napdiem = HistoryNapdiem::all();
        return view('point.napDiem', compact('point_admin', 'lichsu_napdiem'));
    }

    public function postNapDiem(Request $request) {
        $id = User::where('id', '=',$request->username)->first();
        $point = Point::where('user_id', $id->id)->first();
        $point->point += $request->point;
        $point->save();

        $history_napdiem = new HistoryNapdiem;
        $history_napdiem->point = $request->point;
        $history_napdiem->save();
        
        return redirect()->back();
    }

    public function checkNapDiem(Request $request) {
        $id = User::where('username', '=',$request->id)->first();
        if ($id != null) {
            $name = 'Tên '.$id->name;
            $point = Point::where('user_id', $id->id)->first()->point;
            $point = 'Số điểm hiện tại là '.$point;
        } else {
            $name = 'Không tồn tại tài khoản này';
            $point = '';
        }
        return response()->json([
            'id' => $name,
            'point' => $point,
        ]);
    }
    
    public function doanhSoBanHang() {
        $user = User::with('getDoanhSoTuan')->get();
        return view('point.doanhSoBanHang', compact('user'));
    }

    public function doanhSoBanHangCaNhan($id) {
        $user = User::where('id', $id)->with('getDoanhSoTuan')->first();
        $doanhso = $user->getDoanhSoTuan;
        return view('point.doanhSoBanHangCaNhan', compact('doanhso','user'));
    }

    public function getLichsuchuyendiem() {
        $lichsuchuyendiem = HistoryChuyendiem::where('id_chuyen', auth()->user()->id)->get();
        return view('point.lichsuchuyendiem', compact('lichsuchuyendiem'));
    }
}