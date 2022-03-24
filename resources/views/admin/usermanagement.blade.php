@extends('layouts.master')

@section('title', 'Quản lý user')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('/css/user.css') }}">
@endpush

@section('content')
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Quản lý Users</h4>
    </div>
    <div class="widget-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center d-none d-md-table-row">
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
                    <td class="text-center" data-label="STT">{{$key+1}}</td>
                    <td data-label="Tài khoản">{{$u->username}}</td>
                    <td data-label="Tên">{{$u->name}}</td>
                    @if ($u->hasRole('admin')) <td data-label="Chức vụ">Quản trị</td>
                    @elseif ($u->hasRole('distribution')) <td data-label="Chức vụ">Trung tâm phân phối</td>
                    @elseif ($u->hasRole('agent')) <td data-label="Chức vụ">Đại lý bán buôn</td>
                    @elseif ($u->hasRole('collaborators')) <td data-label="Chức vụ">Cộng tác viên</td>
                    @else <td data-label="Chức vụ">Chưa cấp quyền</td>
                    @endif
                    <th class="text-center">
                        <a href="#" class="btn btn-danger" role="button">Sửa</a>
                    </th>
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