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
            
        </tbody>
    </table>
<script>
    $(document).ready(function() {
        $('#doanh-so-ban-hang').DataTable();
    } );
</script>

@endsection