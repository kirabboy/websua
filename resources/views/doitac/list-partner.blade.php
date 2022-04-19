@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<style>
    th, td {
        text-align: center;
    }

    th {
        text-transform: uppercase;
    }
</style>
<div class="container-fluid">
    <div class="box-partner">

            <div class="row tab-pane active" id="menu1">
                <div class="col-sm-12">

                    <div id="w1-pjax" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">
                        <div class="kv-loader-overlay">
                            <div class="kv-loader"></div>
                        </div>
                        <div id="w1" class="grid-view is-bs4 kv-grid-bs4 hide-resize" data-krajee-grid="kvGridInit_42714b76" data-krajee-ps="ps_w1_container">
                            <div class="ms-panel ms-panel-fh card border-default">

                                <div id="treeTable" class="ms-panel-body table-responsive kv-grid-container">
                                    <div id="gridItems">
                                        <table class="kv-grid-table table table-hover table-striped kv-table-wrap" id="gridView">
                                            <thead>

                                                <tr>
                                                    <!-- <th style="width: 4.51%;">#</th> -->
                                                    <th data-col-seq="3" style="width: 10.72%;">Người giới thiệu</th>
                                                    <th data-col-seq="2" style="width: 10.8%;"><a href="javascript:void(0)" data-sort="username">ID Đại lý</a></th>
                                                    <th data-col-seq="3" style="width: 12.21%;">Họ tên</th>
                                                    <th style="width: 8.58%;">Tài khoản</th>
                                                    <th data-col-seq="4" style="width: 10.83%;">Điện thoại</th>
                                                    <th data-col-seq="5" style="width: 8.31%;" class="text-center"><a href="javascript:void(0)" data-sort="level">Cấp</a></th>
                                                    <th data-col-seq="6" style="width: 11.85%;"><a href="javascript:void(0)" data-sort="created_at">Thời gian đăng ký</a></th>


                                                    <th data-col-seq="10" style="width: 8.58%;"><a href="javascript:void(0)" data-sort="flags">Hoạt động</a></th>
                                                </tr>


                                            </thead>
<!-- Data user here -->
                                            <tbody>
                                                @foreach ($listChild as $value)
                                                <tr>
                                                    <td>{{DB::table('users')->where('id', $value->id_dad)->first()->name}}</td>
                                                    <td>{{$value->magioithieu}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->username}}</td>
                                                    <td>{{$value->phone}}</td>
                                                    <td>
                                                        @if ($value->level == 1)
                                                            <span class="label-color c-label" style="background:#dc3545">Admin</span>
                                                        @elseif ($value->level == 2)
                                                            <span class="label-color c-label" style="background:#28a745">T.T phân phối</span>
                                                        @elseif ($value->level == 3)
                                                            <span class="label-color c-label" style="background:#5294e2">Đại lý bán lẻ</span>
                                                        @else
                                                            <span class="label-color c-label" style="background:#ffc107">Cộng tác viên</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$value->created_at->format('d/m/Y')}}</td>
                                                    <td>
                                                        @if ($value->level == 4)
                                                        <span class="label-color" style="background:crimson;">
                                                            <svg class="svg-inline--fa fa-times-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                                            </svg>
                                                        </span>
                                                        @else 
                                                        <span class="label-color" style="background:#b2c74d;">
                                                            <svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                            </svg>
                                                        </span>
                                                        @endif 
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection