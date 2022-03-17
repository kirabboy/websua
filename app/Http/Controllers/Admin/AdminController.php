<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function getUserManagement(){
        $users = User::all();
        return view('admin.usermanagement', compact('users'));
    }

}
