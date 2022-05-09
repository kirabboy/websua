<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Province;
use App\Models\Point;
use App\Models\DoanhSoThang;

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
        if($user == null) return redirect('/dang-nhap')->withErrors(['msg' => 'Người dùng giới thiệu không tồn tại!']);
        $u_name = $user->username;
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        return view('signupwithlink', compact('province','u_name'));
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
            'phone.digits_between' => 'Số điện thoại từ 7 đến 11 chữ số!',
            // 'phone.unique' => 'Số điện thoại đã được sử dụng!',
            'address.required' => 'Nhập số nhà!',
            'email.email' => 'Sai định dạng email!',
            // 'email.unique' => 'Email đã được sử dụng!',
            'taikhoannh.required' => 'Nhập tài khoản ngân hàng!',
            'chuthe.required' => 'Nhập chủ thẻ ngân hàng!',
            'chinhanh.required' => 'Nhập chi nhánh ngân hàng!',
        ];
        
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
            'name' => 'required',
            // 'phone' => 'digits_between:7,11|unique:users,phone',
            'phone' => 'digits_between:7,11',
            'address' => 'required',
            // 'email' => 'email|unique:users,email',
            'email' => 'email',
            'taikhoannh' => 'required',
            'chuthe' => 'required',
            'chinhanh' => 'required',
        ], $error);
        
        if (!$this->ktId_dad($request->gioithieu) && $request->btn_gioithieu ) {
            return back()->withErrors(['gioithieu' => 'Người dùng giới thiệu không tồn tại!']);
        };

        $user = new User();
        if($this->ktId_dad($request->gioithieu)){
            $user->id_dad = $this->ktId_dad($request->gioithieu);
        }
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tinh = $request->sel_province;
        $user->huyen = $request->sel_district;
        $user->xa = $request->sel_ward;
        $user->email = $request->email;
        $user->level = 3;
        $user->nganhang = $request->nganhang;
        $user->taikhoannh = $request->taikhoannh;
        $user->chuthe = $request->chuthe;
        $user->chinhanh = $request->chinhanh;
        $user->save();

        $this->phanvaitro($user->id, $user->level);
        $point = new Point();
        $point->user_id = $user->id;
        $point->save();
        $dst = new DoanhSoThang();
        $dst->user_id = $user->id;
        $dst->save();
        return back()->with('mess', 'Đăng ký thành công!');
    }
    
    public function phanvaitro($userID, $roleId)
    {
        //add model_has_roles
        $role = Role::find($roleId);
        $user = User::find($userID);
        $user->syncRoles($role);
    }
    
    public function ktId_dad($magt){
        return User::where('username', $magt)->value('id');
    }
}
