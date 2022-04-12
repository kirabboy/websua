@extends('layouts.master')

@section('title', 'Quản lý user')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('public/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/user.css') }}">
@endpush

@section('content')
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Quản lý Users</h4>
    </div>
    <div class="widget-body">
        <table id="quanlyuser" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tài khoản</th>
                    <th>Tên</th>
                    <th>Chức vụ</th>
                    <th class="text-center d-none d-md-table-cell">Tùy chỉnh</th>
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
                    @elseif ($u->level == 2) <td data-label="Chức vụ">Đại lý bán buôn</td>
                    @else <td data-label="Chức vụ">Cộng tác viên</td>
                    @endif
                    <th class="text-center">
                        <a href="{{url('/quan-ly-nguoi-dung')}}/{{$u->id}}" class="btn btn-danger" role="button">Sửa</a>
                    </th>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<p></p>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#quanlyuser').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [4]
            }]
        });
    });
</script>
@endpush