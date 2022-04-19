<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function list_partner()
    {
        $user = User::where('id',auth()->user()->id)->with('getChild','getPoint')->first();
        $user_id = $user->id;
        $listChild = [];
        $this->getAllChild($listChild, $user_id);
        $listChild = collect($listChild)->sortBy('id');
        
        return view('doitac.list-partner', compact('listChild'));
    }

    public function getAllChild(&$listChild = [], $id) {
        $user = User::where('id',$id)->with('getChild','getPoint')->first();
        $user_child = $user->getChild;
        if($user_child->count() > 0) {
            foreach($user_child as $value) {
                $child = User::where('id',$value->id)->with('getChild','getPoint')->first();
                $listChild[] = $child;
                self::getAllChild($listChild, $value->id);
            }
        }
    }
}