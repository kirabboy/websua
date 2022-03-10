<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function checkLogin(Request $request){
        $error = [
            'username.required'=>'Nhập tài khoản!',
            'password.required'=>'Nhập mật khẩu!',
        ];
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], $error);
        $arr = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($arr)) {
            return redirect('profile');
        }
        return back()->with('statusfail', 'Tài khoản hoặc mật khẩu không đúng!');
    }
}
