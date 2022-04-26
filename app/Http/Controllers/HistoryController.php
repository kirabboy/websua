<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HistoryNapdiem;
use App\Models\HistoryChuyendiem;

class HistoryController extends Controller
{
    public function getLichsuchuyendiem() {
        $lichsuchuyendiem = HistoryChuyendiem::where('id_chuyen', auth()->user()->id)->get();
        return view('point.lichsuchuyendiem', compact('lichsuchuyendiem'));
    }

    public function getLichsunhandiem() {
        $lichsunhandiem = HistoryChuyendiem::where('user_id', auth()->user()->id)->get();
        return view('point.lichsunhandiem', compact('lichsunhandiem'));
    }
}