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
            <h2 class="text-uppercase text-center">Lịch sử doanh số {{$user->name}}</h2>
            <p> </p>
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
        $('#doanh-so-ban-hang').DataTable();
    } );
</script>

@endsection