@extends('layouts.master')

@section('title', 'SB Admin 2')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row ">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4  col-12 card-table ">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                <h5>Liên kết giới thiệu của bạn</h5>
                            </div>
                            <div class="form-group mb-4 form-click-to-copy-text">
                                <input id="copyInput" class="form-control" type="text" onclick="copyFunct()" value="{{url('/dang-ki')}}/{{Auth::user()->id}}" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4  col-12 card-table ">
            <div class="card card-gradient-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5> DOANH SỐ CÁ NHÂN</h5>
                                <p class="ms-card-change">{{number_format($user->getPoint->doanhso_canhan)}} VNĐ</p>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-award fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-12 card-table ">
            <div class="card card-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5> DOANH SỐ HỆ THỐNG</h5>
                                <p class="ms-card-change">{{number_format($user->getPoint->doanhso)}} VNĐ</p>
                            </div>

                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-globe fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Số điểm hiện tại của user -->
        <div class="col-xl-4 col-12 card-table ">
            <div class="card card-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5> Hoa hồng được hưởng</h5>
                                <p class="ms-card-change pb-3">{{number_format($user->getPoint->point)}} điểm</p>
                            </div>

                        </div>
                        <div class="col-auto mb-4">
                            <i class="fa-solid fa-atom fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Số nhóm hiện tại -->
        <div class="col-xl-4 col-12 card-table ">
            <div class="card card-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5>Tổng đội nhóm</h5>
                                <p class="ms-card-change pb-3">{{$soluong_f1}} nhóm</p>
                            </div>

                        </div>
                        <div class="col-auto mb-4">
                            <i class="fa-solid fa-users fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Số nhóm đủ tiêu chuẩn để nhận thưởng -->
        <div class="col-xl-4 col-12 card-table ">
            <div class="card card-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class=" font-weight-bold text-white text-uppercase mb-1">
                                <h5>Nhóm đạt chuẩn</h5>
                                <p class="ms-card-change pb-3">{{$so_nhom_du_dieu_kien_doi_thuong}} nhóm</p>
                            </div>

                        </div>
                        <div class="col-auto mb-4">
                            <i class="fa-solid fa-circle-check fa-2x text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!----------------------------- Đổi thưởng lấy xe máy ---------------->    
    <div class="row">
        <div class="col-12">
            <div class="product-items">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3 class="text-dark text-uppercase text-center">
                            <i class="fa fa-star ic_star"></i>
                            <span>Top doanh số nhóm</span>
                            <i class="fa fa-star ic_star"></i>
                        </h3>
                        @foreach ($list_doanhso as $list)
                        <div class="row" style="border: 1px solid #ff6a6a; border-radius: 5px; padding: 10px; margin: 0;">  
                            <div class="col-6">
                                <p class="text-dark text-left m-0"
                                    style="font-size: 20px">
                                    Nhóm: {{ DB::table('users')->where('id',$list->user_id)->first()->username }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="text-dark text-right m-0"
                                    style="font-size: 20px">
                                    {{number_format($list->doanhso)}} VND</p>
                            </div>
                        </div>
                        <p> </p>
                        @endforeach
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="row">
                        @foreach ( $points as $point)
                        <div class=" col-12 col-md-12 ">
                            <div class="box-product">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <a title="{{$point->name}}">
                                        <img src="{{url('public/',$point->image)}}" ></a>
                                    </div>
                                    <div class="col-lg-4 text-lg-left mt-lg-0 mt-md-4 ">
                                        <h2 class="text-center m-0 text-uppercase"><a>{{$point->name}}</a></h2>
                                        <div class="mg-30" style="margin-top: 5px">
                                            <p class="text-center">
                                                <span class="label label-success" style="font-size: 14px" name="point">
                                                    {{number_format($point->points)}} điểm</span>
                                            </p>
                                        </div>
                                        <div class="mg-10">
                                            <a href="{{url('/promotion')}}/{{$point->points}}"
                                                class="btn btn-primary btn-sm" style="width:100%">Đổi điểm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----------------------------- End Đổi thưởng lấy xe máy ---------------->    
</div>
<!-- /.container-fluid -->
@endsection

@push('scripts')
<script>
    function copyFunct() {
        /* Get the text field */
        var copyText = document.getElementById("copyInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Đã copy: " + copyText.value);
    }
</script>
@endpush