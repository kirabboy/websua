@extends('layouts.master')
@section('title', 'Doanh số bán hàng')
@section('content')

<style>
    td, th {
        text-align: center;
    }
</style>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
            Doanh số tuần này
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
            Doanh số tuần trước
        </a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table id="doanh-so-ban-hang-tuan-nay" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>DS cá nhân</th>
                        <th>DS nhóm</th>
                        <th>Điểm</th>
                        <th>Thời gian</th>
                        <th>Lịch sử HH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user as $value )
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{number_format($value->getDoanhSoTuan->get(0)->doanhso_canhan)}}</td>
                        <td>{{number_format($value->getDoanhSoTuan->get(0)->doanhso)}}</td>
                        <td>{{number_format($value->getDoanhSoTuan->get(0)->point)}}</td>
                        <td>{{$value->getDoanhSoTuan->get(0)->created_at->format('d/m/Y')}}</td>
                        <td><a href="{{url('/doanh-so-ban-hang/')}}/{{$value->id}}" class="btn btn-dark">Chi tiết</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <table id="doanh-so-ban-hang" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <!-- <th>Tên TK</th>
                        <th>Số TK</th>
                        <th>Ngân hàng</th> -->
                        <th>DS cá nhân</th>
                        <th>DS nhóm</th>
                        <th>Điểm</th>
                        <th>Thời gian</th>
                        <th>Lịch sử HH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user as $value )
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->username}}</td>
                        <!-- <td>{{$value->chuthe}}</td>
                        <td>{{$value->taikhoannh}}</td>
                        <td></td> -->
                        @if($value->getDoanhSoTuan->get(1) != null)
                        <td>{{number_format($value->getDoanhSoTuan->get(1)->doanhso_canhan)}}</td>
                        <td>{{number_format($value->getDoanhSoTuan->get(1)->doanhso)}}</td>
                        <td>{{number_format($value->getDoanhSoTuan->get(1)->point)}}</td>
                        <td>{{$value->getDoanhSoTuan->get(1)->created_at->format('d/m/Y')}}</td>
                        @else
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>Chưa có tạo tài khoản vào tuần này</td>
                        @endif
                        <td><a href="{{url('/doanh-so-ban-hang/')}}/{{$value->id}}" class="btn btn-dark">Chi tiết</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#doanh-so-ban-hang-tuan-nay').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
        });
    } );
</script>

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