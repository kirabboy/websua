<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Province;

use function PHPUnit\Framework\isNan;

class UserController extends Controller
{
    public function getLogin()
    {
        $user = User::find(9);
        $this->phanvaitro($user->id, $user->level);
        return view('user.login');
    }
    public function checkLogin(Request $request)
    {
        $error = [
            'username.required' => 'Nhập tài khoản!',
            'password.required' => 'Nhập mật khẩu!',
        ];
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $error);
        if (Auth::attempt($credentials, $request->input('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('mess', 'Tài khoản hoặc mật khẩu không đúng!',);
    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/dang-nhap');
    }

    public function getRegister()
    {
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        return view('user.register', compact('province'));
    }
    public function checkRegister(Request $request)
    {
        $error = [
            'username.required' => 'Nhập tài khoản!',
            'username.unique' => 'Tài khoản đã tồn tại!',
            'password.required' => 'Nhập mật khẩu!',
            're_password.required' => 'Nhập lại mật khẩu không đúng!',
            're_password.same' => 'Nhập lại mật khẩu không đúng!',
            'name.required' => 'Nhập họ tên!',
            'phone.digits' => 'Số điện thoại chưa đúng!',
            'address.required' => 'Nhập số nhà!',
            'email.email' => 'Sai định dạng email!',
            'cmttruoc.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtsau.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtavt.image' => 'Nhập sai định dạng hình ảnh!',
        ];
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
            're_password' => 'required|same:password',
            'name' => 'required',
            'phone' => 'digits:10',
            'address' => 'required',
            'email' => 'email',
            'cmttruoc' => 'image',
            'cmtsau' => 'image',
            'cmtavt' => 'image',
        ], $error);
        $ma = $this->getMa();
        $cmndfront = null;
        $cmndback = null;
        $avatar = null;
        if ($ma == false) {
            return back()->withErrors(['msg' => 'Số người dùng vượt quá định mức!']);
        }
        if ($request->hasFile('cmttruoc') && $request->getimagesize('cmttruoc')) {
            $cmndfront = $this->xulyanh($request->cmttruoc);
        }
        if ($request->hasFile('cmtsau')) {
            $cmndback = $this->xulyanh($request->cmtsau);
        }
        if ($request->hasFile('daidien')) {
            $avatar = $this->xulyanhavt($request->daidien);
        }
        if(!$this->ktCmnd($request->cmnd)){
            return back()->withErrors(['msg' => 'Nhập sai CMND/CCCD!']);
        };
        

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tinh = $request->sel_province;
        $user->huyen = $request->sel_district;
        $user->xa = $request->sel_ward;
        $user->email = $request->email;
        $user->cmnd = $request->cmnd;
        $user->ngaycmnd = $request->ngaycmnd;
        $user->noicmnd = $request->noicmnd;
        $user->cmttruoc = $cmndfront;
        $user->cmtsau = $cmndback;
        $user->avatar = $avatar;
        $user->magioithieu = $ma;
        $user->level = 4;
        // dd($user);
        $user->save();
        $this->phanvaitro($user->id,$user->level);
        return back()->with('mess', 'Đăng ký thành công!');
    }
    public function getMa()
    {
        $ma = "milk00001";
        $users = User::all();
        if ($users->count() == 0) {
            return $ma;
        }
        $user = $users[$users->count() - 1];
        $id = $user->id + 1;
        if ($id < 100000) {
            $ma = substr($ma, 0, 9 - strlen($id));
            $ma = $ma . "$id";
            return $ma;
        }
        return false;
    }
    public function phanvaitro($userID, $roleId)
    {
        //add model_has_roles
        $role = Role::find($roleId);
        $user = User::find($userID);
        $user->syncRoles($role);
    }
    public function getForgotpw()
    {
        return view('user.forgotpassword');
    }
    public function xulyanh($file)
    {
        $file_name = "cmnd".'_'.time().'.'. $file->getClientOriginalExtension();
        $destinationPath = public_path('/img_cmnd');
        $file->move($destinationPath, $file_name);
        sleep(1);
        return $file_name;
    }
    public function xulyanhavt($file)
    {
        $file_name = "avt".'_'.time().'.'. $file->getClientOriginalExtension();
        $destinationPath = public_path('/img_avt');
        $file->move($destinationPath, $file_name);
        return $file_name;
    }
    public function ktCmnd($cm){
        if($cm == "") return true;
        if(strlen($cm) == 9 || strlen($cm) == 12){
            if(is_numeric($cm)){
                return true;
            }
        }
        return false;
    }
}
