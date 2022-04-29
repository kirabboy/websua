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
        <div class="col-12 text-center"> 
            <h2 class="text-uppercase text-center">Lịch sử doanh số {{$user->name}}</h2>
            @if($user->taikhoannh != null && $user->nganhang != null)
                <p class="text-dark m-0">Tên tài khoản ngân hàng của {{$user->name}}: {{$user->chuthe}}</p>
                <p class="text-dark m-0">Số tài khoản ngân hàng: {{$user->taikhoannh}}</p>
                <p class="text-dark">Ngân hàng: {{DB::table('nganhang')->where('id', $user->nganhang)->first()->tennganhang}}</p>
            @else
                <p class="text-danger">{{$user->name}} chưa cập nhật thông tin tài khoản ngân hàng lên hệ thống</p>
            @endif
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