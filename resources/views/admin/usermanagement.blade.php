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
                @foreach($users as $u)
                @if($u->level != 1)
                <tr>
                    <td class="text-center" data-label="STT">{{$u->id}}</td>
                    <td data-label="Tài khoản">{{$u->username}}</td>
                    <td data-label="Tên">{{$u->name}}</td>
                    @if ($u->level == 1) <td data-label="Chức vụ">Quản trị</td>
                    @elseif ($u->level == 2) <td data-label="Chức vụ">Trung tâm phân phối</td>
                    @elseif ($u->level == 3) <td data-label="Chức vụ">Đại lý bán buôn</td>
                    @else <td data-label="Chức vụ">Cộng tác viên</td>
                    @endif
                    <th class="text-center">
                        <a href="quan-ly-nguoi-dung/{{$u->id}}" class="btn btn-danger" role="button">Sửa</a>
                    </th>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
<p></p>
@endsection
@push('scripts')
@endpush