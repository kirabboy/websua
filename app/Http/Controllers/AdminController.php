<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Province;
use App\Models\Nganhang;
use App\Models\Point;

class AdminController extends Controller
{
    //
    public function getUserManagement()
    {
        $users = User::all();
        return view('admin.usermanagement', compact('users'));
    }
    public function getUserChange($id)
    {
        $userchange = User::find($id);
        $province = Province::select('matinhthanh', 'tentinhthanh')->get();
        $nganhang = Nganhang::select('id','tennganhang')->get();
        $point = Point::where('user_id',$id)->first();
        return view('admin.userchange', 
            compact('userchange', 'province','nganhang', 'point'));
    }
    public function changeUser(Request $request, $id)
    {
        $error = [
            'name.required' => 'Nhập họ tên!',
            'phone.digits_between' => 'Số điện thoại từ 7 đến 11 chữ số!',
            'address.required' => 'Nhập số nhà!',
            'email.email' => 'Sai định dạng email!',
            'cmttruoc.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtsau.image' => 'Nhập sai định dạng hình ảnh!',
            'cmtavt.image' => 'Nhập sai định dạng hình ảnh!',
        ];
        $request->validate([
            'name' => 'required',
            'phone' => 'digits_between:7,11',
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
        $user->level = $request->level;
        $user->save();

        $point=Point::where('user_id', $id)->first();
        $point->point = $request->point;
        $point->save();
        
        $this->phanvaitro($user->id, $user->level);
        return back()->with('mess', 'Thay đổi thông tin thành công!');
    }
    public function changePassword(Request $request, $id)
    {
        $error = [
            'mkmoi.required' => 'Nhập mật khẩu mới!',
            'mkmoi.min' => 'Mật khẩu phải có 6 ký tự trở lên!',
            'nhaplai.same' => 'Nhập lại mật khẩu không đúng!',
        ];
        $request->validate([
            'mkmoi' => 'required|min:6',
            'nhaplai' => 'same:mkmoi',
        ], $error);
        $user = User::find($id);
        $user->password = Hash::make($request->mkmoi);
        $user->save();
        return back()->with('mess', 'Đổi mật khẩu thành công!');
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
    public function phanvaitro($userID, $roleId)
    {
        //add model_has_roles
        $role = Role::find($roleId);
        $user = User::find($userID);
        $user->syncRoles($role);
    }
}
