@extends('layouts.master')

@section('title', 'Thông tin cá nhân')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endpush

@section('content')
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Thông tin cá nhân</h4>
    </div>
    <div class="widget-body">
        <form>
            <div class="form-content">
                <!-- avatar -->
                <div class="form-group text-center">
                    <img src="{{ asset('/img/user_male2.png') }}" id="anhdaidien" alt="doan thi ngoc diep" height="100" width="100">
                    <label class="btn-sm btn-danger btn-avt">
                        Sửa Ảnh <input type="file" id="daidien" style="display: none">
                    </label>
                </div>
                <hr>
                <!-- form thông tin -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên đăng nhập</label>
                    <div class="col-sm-4">
                        <h3 class="heading">{{Auth::user()->username}}</h3>
                    </div>
                    <label class="col-sm-2 col-form-label">Cấp bậc</label>
                    <div class="col-sm-4">
                        <h3 class="heading">
                            @if (Auth::user()->hasRole('admin')) Quản trị
                            @elseif (Auth::user()->hasRole('distribution')) Trung tâm phân phối
                            @elseif (Auth::user()->hasRole('agent')) Đại lý bán buôn
                            @else Cộng tác viên
                            @endif
                        </h3>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ và tên</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Điện thoại</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{Auth::user()->phone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-4">
                        <select name="sel_province" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                            <option value=""> Cấp tỉnh </option>
                            @foreach ($province as $value)
                            <option value="{{ $value->matinhthanh }} " @if($value->matinhthanh == Auth::user()->tinh) selected @endif>{{ $value->tentinhthanh }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control select2" name="sel_district" data-placeholder=" Cấp huyện " required>
                            <option value=""> {{Auth::user()->huyen}} </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control select2" name="sel_ward" data-placeholder=" Cấp xã " required>
                            <option value=""> {{Auth::user()->xa}} </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số nhà</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{Auth::user()->address}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên ngân hàng</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Vd: Sacombank">
                    </div>
                    <label class="col-sm-2 col-form-label">Tài khoản NH</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="070084057183">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chủ thẻ</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="DOAN THI NGOC DIEP">
                    </div>
                    <label class="col-sm-2 col-form-label">Chi nhánh</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="Long An">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CMT</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="300872666">
                    </div>
                    <label class="col-sm-2 col-form-label">Ngày cấp</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" value="2020-01-01">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nơi cấp</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="C.A. Long An">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CMT mặt trước</label>
                    <div class="col-sm-4">
                        <img class="anhcmt" src="{{ asset('/img/img_nogr.jpg') }}" id="anhcmttruoc" alt="doan thi ngoc diep">
                        <br />
                        <label class="btn-sm btn-danger">
                            Sửa Ảnh <input type="file" id="cmttruoc" style="display: none">
                        </label>
                    </div>
                    <label class="col-sm-2 col-form-label">CMT mặt sau</label>
                    <div class="col-sm-4">
                        <img class="anhcmt" src="{{ asset('/img/img_nogr.jpg') }}" id="anhcmtsau" alt="doan thi ngoc diep">
                        <br />
                        <label class="btn-sm btn-danger">
                            Sửa Ảnh <input type="file" id="cmtsau" style="display: none">
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="button" id="btn_dk" class="btn btn-primary btn">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
<p></p>
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Thay đổi mật khẩu</h4>
    </div>
    <div class="widget-body">
        <form>
            <div class="form-content">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-right">
                <button type="button" id="btn_dk" class="btn btn-primary btn">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('/js/shipping.js') }}"></script>
<script src="{{ asset('/js/profile.js') }}"></script>
@endpush