<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Province;
use App\Models\Point;

class SignupController extends Controller
{
    public function getRegister()
    {
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        return view('signup', compact('province'));
    }
    public function getRegisterId($id)
    {
        $user = User::find($id);
        if($user == null) return redirect('/dang-nhap')->withErrors(['msg' => 'Mã giới thiệu không tồn tại!']);
        $magioithieu = $user->magioithieu;
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        return view('signupwithlink', compact('province','magioithieu'));
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
            'cmttruoc' => 'image',
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
        if (!$this->ktId_dad($request->gioithieu) && $request->btn_gioithieu ) {
            return back()->withErrors(['msg' => 'Mã giới thiệu không tồn tại!']);
        };

        $user = new User();
        $user->id_dad = $this->ktId_dad($request->gioithieu);
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
        $user->save();
        $this->phanvaitro($user->id, $user->level);
        $point = new Point();
        $point->user_id = $user->id;
        $point->save();
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
    public function ktId_dad($magt){
        if (User::where('magioithieu', $magt)->first() != null) {
            return User::where('magioithieu', $magt)->value('id');
        }
        return null;
    }
}
