<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function list_partner()
    {
        $user = User::find(auth()->user())->first();
        dd($user);
        return view('list-partner');
    }

}