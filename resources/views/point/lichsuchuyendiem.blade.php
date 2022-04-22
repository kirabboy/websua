@extends('layouts.master')
@section('title', 'Lịch sử chuyển điểm')
@section('content')

<style>
    td, th {
        text-align: center;
    }
</style>
<p class="text-dark text-uppercase text-center" style="font-size: 24px">
    Lịch sử chuyển điểm</p>

    <table id="lich-su-chuyen-diem" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Thời gian</th>
                <th>Tên người nhận</th>
                <th>Điểm</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $lichsuchuyendiem as $value )
            <tr>
                <td>{{$value->created_at}}</td>
                <td>{{DB::table('users')->where('id', $value->user_id)->first()->username}}</td>
                <td>{{number_format($value->point)}}</td>
                <td>{{$value->note}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
<script>
    $(document).ready(function() {
        $('#lich-su-chuyen-diem').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
        });
    } );
</script>

@endsection