@extends('layouts.master')

@section('title', 'Cài đặt hoa hồng trực tiếp')

@section('content')

<div class="container">
    <form method="POST" action="{{route('setHoahongtructiep')}}">
    <!-- Phần thưởng mốc 1 -->
    <div class="row pt-2">
        <div class="col-4">
            <label class="control-label">Từ:</label>
            <input class="form-control" name="moc0" value="{{$setting->moc0}}">
        </div>
        <div class="col-4">
            <label class="control-label">Đến:</label>
            <input class="form-control" name="moc1" value="{{$setting->moc1}}">
        </div>
        <div class="col-4">
            <label class="control-label">% thưởng:</label>
            <input class="form-control" name="hoahong1" value="{{$setting->hoahong1}}">
        </div>
    </div>
    <!-- Phần thưởng mốc 2 -->
    <div class="row pt-2">
        <div class="col-4">
            <label class="control-label">Từ:</label>
            <input class="form-control" value="{{$setting->moc1}}" readonly>
        </div>
        <div class="col-4">
            <label class="control-label">Đến:</label>
            <input class="form-control" name="moc2" value="{{$setting->moc2}}">
        </div>
        <div class="col-4">
            <label class="control-label">% thưởng:</label>
            <input class="form-control" name="hoahong2" value="{{$setting->hoahong2}}">
        </div>
    </div>
    <!-- Phần thưởng mốc 3 -->
    <div class="row pt-2">
        <div class="col-4">
            <label class="control-label">Từ:</label>
            <input class="form-control" value="{{$setting->moc2}}" readonly>
        </div>
        <div class="col-4">
            <label class="control-label">Đến:</label>
            <input class="form-control" name="moc3" value="{{$setting->moc3}}">
        </div>
        <div class="col-4">
            <label class="control-label">% thưởng:</label>
            <input class="form-control" name="hoahong3" value="{{$setting->hoahong3}}">
        </div>
    </div>
    <div class="pt-3">
        <button class="btn btn-dark" style="width: 100%" type="submit">UPDATE</button>
    </div>
    @csrf
    </form>
</div>
@endsection