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
                <tr class="text-center">
                    <th>STT</th>
                    <th>Tài khoản</th>
                    <th>Tên</th>
                    <th>Chức vụ</th>
                    <th>Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $u)
                <tr>
                    <td class="text-center">{{$key+1}}</td>
                    <td>{{$u->username}}</td>
                    <td>{{$u->name}}</td>
                    <td>
                        @if ($u->hasRole('admin')) Quản trị
                        @elseif ($u->hasRole('distribution')) Trung tâm phân phối
                        @elseif ($u->hasRole('agent')) Đại lý bán buôn
                        @elseif ($u->hasRole('collaborators')) Cộng tác viên
                        @else Chưa cấp quyền
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