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
use App\Models\Nganhang;
use App\Models\Trungtampp;
use App\Models\District;
use App\Models\Ward;
use App\Models\Point;

use function PHPUnit\Framework\isNan;

class UserController extends Controller
{
    public function getLogin()
    {
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
        return redirect('/dang-nhap')->with('matkhau', 'Đăng xuất thành công!');
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
            'password.min' => 'Mật khẩu phải có 6 ký tự trở lên!',
            're_password.required' => 'Nhập lại mật khẩu không đúng!',
            're_password.same' => 'Nhập lại mật khẩu không đúng!',
            'name.required' => 'Nhập họ tên!',
            'phone.digits' => 'Số điện thoại chưa đúng!',
            'phone.unique' => 'Số điện thoại đã được sử dụng!',
            'address.required' => 'Nhập số nhà!',
            'email.email' => 'Sai định dạng email!',
            'email.unique' => 'Email đã được sử dụng!',
            'cmttruoc.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtsau.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtavt.image' => 'Nhập sai định dạng hình ảnh!',
        ];
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
            'name' => 'required',
            'phone' => 'digits:10|unique:users,phone',
            'address' => 'required',
            'email' => 'email|unique:users,email',
            'cmttruoc' => 'default|image',
            'cmtsau' => 'image',
            'cmtavt' => 'image',
        ], $error);
        $ma = $this->getMa();
        if ($ma == false) {
            return back()->withErrors(['msg' => 'Số người dùng vượt quá định mức!']);
        }
        if (!$this->ktCmnd($request->cmnd)) {
            return back()->withErrors(['msg' => 'Nhập sai CMND/CCCD!']);
        };

        $user = new User();
        $user->id_dad = Auth::user()->id;
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
        $user->nganhang = $request->nganhang;
        $user->taikhoannh = $request->taikhoannh;
        $user->chuthe = $request->chuthe;
        $user->chinhanh = $request->chinhanh;
        $user->magioithieu = $ma;
        $user->level = 3;
        if ($request->hasFile('cmttruoc')) {
            $cmndfront = $this->xulyanh($request->cmttruoc);
            $user->cmttruoc = $cmndfront;
        }
        if ($request->hasFile('cmtsau')) {
            $cmndback = $this->xulyanh($request->cmtsau);
            $user->cmtsau = $cmndback;
        }
        if ($request->hasFile('daidien')) {
            $avatar = $this->xulyanhavt($request->daidien);
            $user->avatar = $avatar;
        }
        // dd($user);
        $user->save();
        $this->phanvaitro($user->id, $user->level);
        $point = new Point();
        $point->user_id = $user->id;
        $point->save();
        return back()->with('mess', 'Đăng ký thành công!');
    }
    public function getProfile()
    {
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        $nganhang = Nganhang::select('id','tennganhang')->get();
        return view('user.profile', compact('province','nganhang'));
    }
    public function changeProfile(Request $request, $id)
    {
        $error = [
            'name.required' => 'Nhập họ tên!',
            'phone.digits' => 'Số điện thoại chưa đúng!',
            'address.required' => 'Nhập số nhà!',
            'email.email' => 'Sai định dạng email!',
            'cmttruoc.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtsau.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtavt.image' => 'Nhập sai định dạng hình ảnh!',
        ];
        $request->validate([
            'name' => 'required',
            'phone' => 'digits:10',
            'address' => 'required',
            'email' => 'email',
            'cmttruoc' => 'image',
            'cmtsau' => 'image',
            'cmtavt' => 'image',
        ], $error);

        $user = User::find($id);
        $cmndfront = $user->cmttruoc;
        $cmndback = $user->cmtsau;
        $avatar = $user->avatar;

        if ($request->hasFile('cmttruoc') && $request->cmttruoc != $cmndfront) {
            $cmndfront = $this->xulyanh($request->cmttruoc);
        }
        if ($request->hasFile('cmtsau') && $request->cmtsau != $cmndback) {
            $cmndback = $this->xulyanh($request->cmtsau);
        }
        if ($request->hasFile('daidien') && $request->daidien != $avatar) {
            $avatar = $this->xulyanhavt($request->daidien);
        }
        if (!$this->ktCmnd($request->cmnd)) {
            return back()->withErrors(['msg' => 'Nhập sai CMND/CCCD!']);
        }
        if ($request->phone != $user->phone){
            if (User::where('phone', $request->phone)->first() == null){
                $user->phone = $request->phone;
            }
            else return back()->withErrors(['msg' => 'Số điện thoại đã được sử dụng!']);
        }
        if ($request->email != $user->email){
            if (User::where('email', $request->email)->first() == null){
                $user->email = $request->email;
            }
            else return back()->withErrors(['msg' => 'Email đã được sử dụng!']);
        }

        $user->name = $request->name;
        $user->address = $request->address;
        $user->tinh = $request->sel_province;
        $user->huyen = $request->sel_district;
        $user->xa = $request->sel_ward;
        $user->cmnd = $request->cmnd;
        $user->ngaycmnd = $request->ngaycmnd;
        $user->noicmnd = $request->noicmnd;
        $user->cmttruoc = $cmndfront;
        $user->cmtsau = $cmndback;
        $user->nganhang = $request->nganhang;
        $user->taikhoannh = $request->taikhoannh;
        $user->chuthe = $request->chuthe;
        $user->chinhanh = $request->chinhanh;
        $user->avatar = $avatar;
        $user->save();
        return back()->with('mess', 'Thay đổi thông tin thành công!');
    }
    public function changePassword(Request $request, $id)
    {
        $error = [
            'mkcu.required' => 'Nhập mật khẩu cũ!',
            'mkmoi.required' => 'Nhập mật khẩu mới!',
            'nhaplai.required' => 'Nhập lại mật khẩu không đúng!',
            'nhaplai.same' => 'Nhập lại mật khẩu không đúng!',
        ];
        $request->validate([
            'mkcu' => 'required',
            'mkmoi' => 'required',
            'nhaplai' => 'required|same:mkmoi',
        ], $error);
        $user = User::find($id);
        if (Hash::check($request->mkcu, $user->password)) {
            $user->password = Hash::make($request->mkmoi);
            $user->save();
            return $this->getLogout($request)->with('matkhau', 'Đổi mật khẩu thành công. Hệ thống tự động đăng xuất!');
        }
        return back()->withErrors(['msg' => 'Mật khẩu cũ không đúng!']);
    }
    public function getTtpp(){
        $trungtam = Trungtampp::select('id', 'user_id', 'tentrungtam')->get();
        $trungtamcanhan = Trungtampp::select('id', 'user_id', 'tentrungtam')->where('user_id', Auth::user()->id)->get();
        return view('user.trungtamphanphoi', compact('trungtam','trungtamcanhan'));
    }
    public function themTtpp(Request $request){
        $error = [
            'tenttpp.required' => 'Nhập tên trung tâm!',
            'tenttpp.unique' => 'Đã tồn tại trung tâm này!',
        ];
        $request->validate([
            'tenttpp' => 'required|unique:trungtampp,tentrungtam',
        ], $error);

        $trungtam = new Trungtampp();
        $trungtam->tentrungtam = $request->tenttpp;
        $trungtam->user_id = Auth::user()->id;
        $trungtam->save();
        return back()->with('mess', 'Thêm trung tâm thành công!');
    }
    public function suaTtpp(Request $request, $id){
        $error = [
            'tenttpp.required' => 'Nhập tên trung tâm!',
        ];
        $request->validate([
            'tenttpp' => 'required',
        ], $error);
        $trungtam = Trungtampp::find($id);
        if ($request->tenttpp != $trungtam->tentrungtam){
            if (Trungtampp::where('tentrungtam', $request->tenttpp)->first() == null){
                $trungtam->tentrungtam = $request->tenttpp;
            }
            else return back()->withErrors(['msg' => 'Tên trung tâm đã được sử dụng!']);
        }
        $trungtam->save();
        return back()->with('mess', 'Sửa trung tâm thành công!');
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
        $file_name = "cmnd" . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/img_cmnd');
        $file->move($destinationPath, $file_name);
        sleep(1);
        return $file_name;
    }
    public function xulyanhavt($file)
    {
        $file_name = "avt" . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/img_avt');
        $file->move($destinationPath, $file_name);
        return $file_name;
    }
    public function ktCmnd($cm)
    {
        if ($cm == "") return true;
        if (strlen($cm) == 9 || strlen($cm) == 12) {
            if (is_numeric($cm)) {
                return true;
            }
        }
        return false;
    }
}
