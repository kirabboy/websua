@extends('layouts.master')

@section('title', 'Doanh số bán hàng')

@section('content')

<style>
    td, th {
        text-align: center;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12"> 
            <h2 class="text-uppercase text-center">Lịch sử doanh số {{$user->username}}</h2>
            @if($user->taikhoannh != null && $user->nganhang != null)
            <div class="row">
                <div class="col-12 col-md-6">
                        <p class="text-dark m-0">Tên tài khoản ngân hàng của {{$user->name}}: {{$user->chuthe}}</p>
                        <p class="text-dark m-0">Số tài khoản ngân hàng: {{$user->taikhoannh}}</p>
                        <p class="text-dark m-0">Chi nhánh: {{$user->chinhanh}}</p>
                        <p class="text-dark">Ngân hàng: {{DB::table('nganhang')->where('id', $user->nganhang)->first()->tennganhang}}</p>
                </div>

                <div class="col-12 col-md-6 text-right pb-2">
                    <form action="{{url('doanh-so-ban-hang')}}/{{$user->id}}" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-8 pb-2">
                                <input class="form-control" name="amount" placeholder="Nhập số tiền chuyển khoản cho {{$user->username}}">
                            </div>
                            <div class="col-12 col-md-4 pb-2">
                                <button class="btn btn-dark" style="width:100%" type="submit">Chuyển tiền</button>
                            </div>
                        </div>
                    @csrf
                    </form>
                    <p class="text-dark m-0">Hoa hồng được hưởng: {{number_format($point->point)}} VNĐ</p>
                    <p class="text-dark m-0">Hoa hồng đã nhận: {{number_format($point->chuyenkhoan_hoahong)}} VNĐ</p>
                    <p class="text-dark m-0">Hoa hồng chưa nhận: {{number_format($point->point - $point->chuyenkhoan_hoahong)}} VNĐ</p>
                </div>
            </div>
            @else
                <p class="text-danger">{{$user->name}} chưa cập nhật thông tin tài khoản ngân hàng lên hệ thống</p>
            @endif
        </div>
        <div class="col-3"></div>

        
        <div class="col-12 text-center"> 
            <table id="doanh-so-ban-hang" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Thời gian</th>
                        <th>Doanh số cá nhân</th>
                        <th>Doanh số nhóm</th>
                        <th>Điểm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $doanhso as $value )
                    <tr>
                        <td>{{$value->created_at->format('d/m/Y')}}</td>
                        <td>{{$value->doanhso_canhan}}</td>
                        <td>{{$value->doanhso}}</td>
                        <td>{{$value->point}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#doanh-so-ban-hang').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
        });
    } );
</script>

@endsection