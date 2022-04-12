@extends('layouts.master')

@section('title', 'Trung tâm phân phối')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('public/css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/user.css') }}">
@endpush

@section('content')
<!-- button modal thêm mới -->
<div class="pb-3 pl-3 pr-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themmoittpp">
        <i class="fa-solid fa-plus"></i> Thêm mới
    </button>
</div>
@if ($errors->any())
<div class="pb-3 pl-3 pr-3">
    @foreach ($errors->all() as $e)
    <div class="text-center alert-danger form-control">{{ $e }}</div>
    @endforeach
</div>
@endif
@if (session('mess'))
<div class="pb-3 pl-3 pr-3">
    <div class="text-center alert-success form-control">{{ session('mess') }}</div>
</div>
@endif
<!-- nội dung trung tâm phân phối -->
<div class="profile-content widget">
    <div class="widget-head">
        <h4 class="heading">Trung tâm phân phối</h4>
    </div>
    <div class="widget-body">
        @role('admin')
        <table id="ttppadmin" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên trung tâm</th>
                    <th>Người tạo</th>
                    <th class="text-center d-none d-md-table-cell">Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trungtam as $tt)
                <tr>
                    <td data-label="ID">{{$tt->id}}</td>
                    <td data-label="Tên trung tâm">{{$tt->tentrungtam}}</td>
                    <td data-label="Người tạo">{{DB::table('users')->where('id',$tt->user_id)->first()->name}}</td>
                    <th class="text-center">
                        <button type="button" data-target="#suattpp_{{$tt->id}}" data-toggle="modal" class="btn btn-danger">Sửa</button>
                    </th>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <th>ID</th>
                <th>Tên trung tâm</th>
                <th>Người tạo</th>
                <th>Tùy chỉnh</th>
            </tfoot> -->
        </table>
        @endrole
        @role('daily')
        <table id="ttpp" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên trung tâm</th>
                    <th class="text-center d-none d-md-table-cell">Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trungtamcanhan as $tt)
                <tr>
                    <td data-label="ID">{{$tt->id}}</td>
                    <td data-label="Tên trung tâm">{{$tt->tentrungtam}}</td>
                    <th class="text-center">
                        <button type="button" data-target="#suattpp_{{$tt->id}}" data-toggle="modal" class="btn btn-danger">Sửa</button>
                    </th>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <th>ID</th>
                <th>Tên trung tâm</th>
                <th>Người tạo</th>
                <th>Tùy chỉnh</th>
            </tfoot> -->
        </table>
        @endrole
    </div>
</div>
<!-- modal thêm mới -->
<div class="modal fade" id="themmoittpp">
    <div class="modal-dialog modal-dialog-centered">
        <div class="profile-content widget modal-content">
            <div class="widget-head modal-header">
                <h4 class="heading">Thêm mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="widget-body">
                <form method="post" action="{{url('/trung-tam-phan-phoi')}}">
                    @csrf
                    <div class="form-content">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label>Tên trung tâm phân phối</label>
                                <input class="form-control" name="tenttpp">
                            </div>
                            <div class="form-group col-12 text-center m-0">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal sửa -->
@foreach($trungtam as $tt)
<div class="modal fade" id="suattpp_{{$tt->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="profile-content widget modal-content">
            <div class="widget-head modal-header">
                <h4 class="heading">Sửa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="widget-body">
                <form method="post" action="{{url('/trung-tam-phan-phoi')}}/{{$tt->id}}">
                    @csrf
                    <div class="form-content">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label>Tên trung tâm phân phối</label>
                                <input class="form-control" name="tenttpp" value="{{$tt->tentrungtam}}">
                            </div>
                            <div class="form-group col-12 text-center m-0">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ttppadmin').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [3]
            }]
        });
        $('#ttpp').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json"
            },
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [2]
            }]
        });
    });
</script>
@endpush