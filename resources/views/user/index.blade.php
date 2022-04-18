@extends('layouts.master')

@section('title', 'SB Admin 2')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
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
                            <div class="form-group mb-4 form-click-to-copy-text">
                                <input id="copyInput" class="form-control" type="text" onclick="copyFunct()" value="{{url('/dang-ki')}}/{{Auth::user()->id}}" readonly>
                            </div>
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
                                <p class="ms-card-change">{{$user->getPoint->doanhso_canhan}} VNĐ</p>
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
                                <p class="ms-card-change">{{$user->getPoint->doanhso}} VNĐ</p>
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