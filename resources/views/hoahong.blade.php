@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')

@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="url-home" content="{{ URL::to('/') }}" />
@endpush

@section('content')




<!-- <div class="col-md-12 pb-3">
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
</div> -->

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/js/shipping.js') }}"></script>
@endpush