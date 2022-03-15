<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function checkLogin(Request $request){
        $error = [
            'username.required'=>'Nhập tài khoản!',
            'password.required'=>'Nhập mật khẩu!',
        ];
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $error);
        if (Auth::attempt($credentials, $request->input('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('profile');
        }
        return back()->with('mess','Tài khoản hoặc mật khẩu không đúng!',);
    }
    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function getRegister(){
        return view('register');
    }
    public function checkRegister(Request $request){
        $error = [
            'username.required'=>'Nhập tài khoản!',
            'username.unique'=>'Tài khoản đã tồn tại!',
            'name.required'=>'Nhập họ tên!',
            'password.required'=>'Nhập mật khẩu!',
            're_password.required'=>'Nhập lại mật khẩu không đúng!',
            're_password.same'=>'Nhập lại mật khẩu không đúng!',
        ];
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'name' => 'required',
            're_password' => 'required|same:password',
        ], $error);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('mess','Đăng ký thành công!');
    }
}
