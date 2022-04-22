@extends('layouts.master')
@section('title', 'Doanh số bán hàng')
@section('content')

<style>
    td, th {
        text-align: center;
    }
</style>
<table id="doanh-so-ban-hang" class="display" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Thời gian</th>
                <th>Doanh số cá nhân</th>
                <th>Doanh số nhóm</th>
                <th>Điểm</th>
                <th>Lịch sử danh sách điểm tuần</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $user as $value )
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->getDoanhSoTuan->first()->created_at->format('d/m/Y')}}</td>
                <td>{{$value->getDoanhSoTuan->first()->doanhso_canhan}}</td>
                <td>{{$value->getDoanhSoTuan->first()->doanhso}}</td>
                <td>{{$value->getDoanhSoTuan->first()->point}}</td>
                <td><a href="{{url('/doanh-so-ban-hang/')}}/{{$value->id}}" class="btn btn-dark">Chi tiết</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
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