@extends('layouts.master')

@section('title', 'Chỉnh sửa thông tin')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endpush

@section('content')
@if ($errors->any())
<div class="alert alert-danger" style="margin: 0 15px 15px;">
    @if ($errors->count() == 1)
    @foreach ($errors->all() as $e)
    <div>{{ $e }}</div>
    @endforeach
    @else
    <div>Vui lòng không bỏ trống</div>
    @endif
</div>
@endif
@if (session('mess'))
<div class="alert alert-success" style="margin: 0 15px 15px;">
    {{ session('mess') }}
</div>
@endif
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Người dùng: {{$userchange->username}}</h4>
    </div>
    <div class="widget-body">
        <form method="post" action="{{$userchange->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <!-- avatar -->
                <div class="form-group text-center">
                    <img src="{{ asset('/img_avt') }}/{{$userchange->avatar}}" id="anhdaidien" alt="{{$userchange->avatar}}" height="100" width="100">
                    <label class="btn-sm btn-danger btn-avt">
                        Sửa Ảnh <input type="file" name="daidien" id="daidien" style="display: none">
                    </label>
                </div>
                <hr>
                <!-- form thông tin -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên đăng nhập</label>
                    <div class="col-sm-4">
                        <h3 class="heading">{{$userchange->username}}</h3>
                    </div>
                    <label class="col-sm-2 col-form-label">Cấp bậc</label>
                    <div class="col-sm-4">
                        <!-- <h3 class="heading">
                            @if ($userchange->hasRole('admin')) Quản trị
                            @elseif ($userchange->hasRole('distribution')) Trung tâm phân phối
                            @elseif ($userchange->hasRole('agent')) Đại lý bán buôn
                            @else Cộng tác viên
                            @endif
                        </h3> -->
                        <select name="level" id="" class="form-control">
                            <option value="1" @if($userchange->level == 1) selected @endif>Quản trị</option>
                            <option value="2" @if($userchange->level == 2) selected @endif>Trung tâm phân phối</option>
                            <option value="3" @if($userchange->level == 3) selected @endif>Đại lý bán buôn</option>
                            <option value="4" @if($userchange->level == 4) selected @endif>Cộng tác viên</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ và tên</label>
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="{{$userchange->name}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Điện thoại</label>
                    <div class="col-sm-4">
                        <input type="text" name="phone" class="form-control" value="{{$userchange->phone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-4 form-group">
                        <select name="sel_province" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                            <option value=""> Cấp tỉnh </option>
                            @foreach ($province as $value)
                            <option value="{{ $value->matinhthanh }} " @if($value->matinhthanh == $userchange->tinh) selected @endif>{{ $value->tentinhthanh }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 form-group">
                        <select class="form-control select2" name="sel_district" data-placeholder=" Cấp huyện " required>
                            <option value="{{$userchange->huyen}}">
                                {{DB::table('district')->where('maquanhuyen',$userchange->huyen)->first()->tenquanhuyen}}
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-4 form-group">
                        <select class="form-control select2" name="sel_ward" data-placeholder=" Cấp xã " required>
                            <option value="{{$userchange->xa}}">
                                {{DB::table('ward')->where('maphuongxa',$userchange->xa)->first()->tenphuongxa}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số nhà</label>
                    <div class="col-sm-4">
                        <input type="text" name="address" class="form-control" value="{{$userchange->address}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" value="{{$userchange->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên ngân hàng</label>
                    <div class="col-sm-4">
                        <input type="text" name="nganhang" class="form-control text-capitalize" placeholder="Vd: Sacombank" value="{{$userchange->nganhang}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Tài khoản NH</label>
                    <div class="col-sm-4">
                        <input type="text" name="taikhoannh" class="form-control" value="{{$userchange->taikhoannh}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chủ thẻ</label>
                    <div class="col-sm-4">
                        <input type="text" name="chuthe" class="form-control text-uppercase" value="{{$userchange->chuthe}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Chi nhánh</label>
                    <div class="col-sm-4">
                        <input type="text" name="chinhanh" class="form-control" value="{{$userchange->chinhanh}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CMND/CCCD</label>
                    <div class="col-sm-4">
                        <input type="text" name="cmnd" class="form-control" value="{{$userchange->cmnd}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Ngày cấp</label>
                    <div class="col-sm-4">
                        <input type="date" name="ngaycmnd" class="form-control" value="{{$userchange->ngaycmnd}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nơi cấp</label>
                    <div class="col-sm-4">
                        <input type="text" name="noicmnd" class="form-control" value="{{$userchange->noicmnd}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CMT mặt trước</label>
                    <div class="col-sm-4">
                        <img class="anhcmt" src="{{ asset('/img_cmnd') }}/{{$userchange->cmttruoc}}" id="anhcmttruoc" alt="{{$userchange->cmttruoc}}">
                        <br />
                        <label class="btn-sm btn-danger">
                            Sửa Ảnh <input type="file" name="cmttruoc" id="cmttruoc" style="display: none">
                        </label>
                    </div>
                    <label class="col-sm-2 col-form-label">CMT mặt sau</label>
                    <div class="col-sm-4">
                        <img class="anhcmt" src="{{ asset('/img_cmnd') }}/{{$userchange->cmtsau}}" id="anhcmtsau" alt="{{$userchange->cmtsau}}">
                        <br />
                        <label class="btn-sm btn-danger">
                            Sửa Ảnh <input type="file" name="cmtsau" id="cmtsau" style="display: none">
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn">Cập nhật</button>
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
        <form method="post" action="doi-mat-khau/{{$userchange->id}}">
            @csrf
            <div class="form-content">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-8">
                        <input type="password" name="mkcu" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-8">
                        <input type="password" name="mkmoi" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" name="nhaplai" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn">Cập nhật</button>
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