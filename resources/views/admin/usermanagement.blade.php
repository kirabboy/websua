@extends('layouts.master')

@section('title', 'Quản lý user')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endpush

@section('content')
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Quản lý Users</h4>
    </div>
    <div class="widget-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tài khoản</th>
                    <th>Tên</th>
                    <th>Chức vụ</th>
                    <th>Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->username}}</td>
                    <td>
                        @if ($u->hasRole('admin')) Quản trị
                        @elseif ($u->hasRole('distribution')) Trung tâm phân phối
                        @elseif ($u->hasRole('agent')) Đại lý bán buôn
                        @else Cộng tác viên
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger" role="button">Sửa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<p></p>
@endsection
@push('scripts')
@endpush