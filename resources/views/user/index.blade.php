@extends('layouts.master')

@section('title', 'SB Admin 2')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div> -->

    <!-- Content Row -->
    <div class="row ">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4  col-12 mb-4 card-table ">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                <h5>Liên kết giới thiệu của bạn</h5>
                            </div>
                            <form method="post" class="clearfix">
                                <div class="form-group mb-4">
                                    <button type="button" style="text-align: left;overflow:hidden" data-toggle="tooltip" data-placement="bottom" data-trigger="manual" title="Đã sao chép" id="referrer-link" data-clipboard-text="http://forvietvn.com/sign-up?ref=ngocdiep1" class="form-control" onclick="select_all_and_copy(document.getElementById('referrer-link'))" value="http://forvietvn.com/sign-up?ref=ngocdiep1">http://forvietvn.com/sign-up?ref=ngocdiep1</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4  col-12 mb-4 card-table ">
            <div class="card card-gradient-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5> DOANH SỐ CÁ NHÂN</h5>
                                <p class="ms-card-change">{{$user->getPoint->doanhso_canhan}}</p>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-globe fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-12 mb-4 card-table ">
            <div class="card card-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5> DOANH SỐ HỆ THỐNG</h5>
                                <p class="ms-card-change">{{$user->getPoint->doanhso}}</p>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-globe fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->
@endsection