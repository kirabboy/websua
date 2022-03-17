

@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')

@section('content')


<div class="col-md-12 pb-3">
    <select name="sel_province" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
        <option value=""> Cấp tỉnh </option>
            @foreach ($province as $value)
                <option value="{{ $value->matinhthanh }}">{{ $value->tentinhthanh }}
                </option>
            @endforeach
    </select>
</div>
<div class="col-md-12 pb-3">
    <select class="form-control select2" name="sel_district" data-placeholder=" Cấp huyện " required>
        <option value=""> Cấp huyện </option>
    </select>
</div>
<div class="col-md-12 pb-3">
    <select class="form-control select2" name="sel_ward" data-placeholder=" Cấp xã " required>
        <option value=""> Cấp xã </option>
    </select>
</div>

@endsection

<script src="{{ asset('public/js/shipping.js') }}"></script>