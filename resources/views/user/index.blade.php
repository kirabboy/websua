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
                                <h5> DOANH SỐ HỆ THỐNG</h5>
                                <p class="ms-card-change">45,824,000</p>
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
                                <p class="ms-card-change">45,824,000</p>
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

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="panel-body">
                        <ul class="nav nav-tabs tabs-bordered d-flex nav-justified justify-content-between px-3" role="tablist">
                            <li role="presentation" class="fs-12">
                                <a href="#level-ctv" class="active show" role="tab" data-toggle="tab" style="color: #b2c74d;" aria-selected="true"> Cộng tác viên </a>
                            </li>
                            <li role="presentation" class="fs-12">
                                <a href="#level-dlbl" class="" role="tab" data-toggle="tab" style="color: #75bb6f;" aria-selected="false"> Đại lý bán lẻ </a>
                            </li>
                            <li role="presentation" class="fs-12">
                                <a href="#level-dlbb" class="" role="tab" data-toggle="tab" style="color: #299421;" aria-selected="false"> Đại lý bán buôn </a>
                            </li>
                            <li role="presentation" class="fs-12">
                                <a href="#level-dlc1" class="" role="tab" data-toggle="tab" style="color: #bf9235;" aria-selected="false"> Đại lý cấp 1 </a>
                            </li>
                            <li role="presentation" class="fs-12">
                                <a href="#level-tdl" class="" role="tab" data-toggle="tab" style="color: #ff6666;" aria-selected="false"> Tổng đại lý </a>
                            </li>
                            <li role="presentation" class="fs-12">
                                <a href="#level-npp" class="" role="tab" data-toggle="tab" style="color: #bf4d35;" aria-selected="false"> Nhà phân phối </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="level-ctv" style="padding: 20px;">
                                <div class="reward" style="color:#b2c74d">
                                    <div class="reward-icon">
                                        <img src="https://forvietvn.com/Content/Forviet/img/ctv.png ">
                                    </div>
                                    <div class="reward-content">Cộng tác viên</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Doanh số 3 tháng hiện tại
                                        <b class="total3Month">0</b>₫
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #b2c74d!important;width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                <span class="progress-label">0₫</span>
                                <span class="progress-status">2,000,000₫</span>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="level-dlbl" style="padding: 20px;">
                                <div class="reward" style="color:#75bb6f">
                                    <div class="reward-icon">
                                        <img src="https://forvietvn.com/Content/Forviet/img/dlbl.png">
                                    </div>
                                    <div class="reward-content">Đại lý bán lẻ</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Doanh số 3 tháng hiện tại
                                        <b class="total3Month">0</b>₫
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #75bb6f!important;width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                <span class="progress-label">2,000,000₫</span>
                                <span class="progress-status">40,000,000₫</span>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="level-dlbb" style="padding: 20px;">
                                <div class="reward" style="color:#299421">
                                    <div class="reward-icon">
                                        <img src="https://forvietvn.com/Content/Forviet/img/dlbb.png">
                                    </div>
                                    <div class="reward-content">Đại lý bán buôn</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Doanh số 3 tháng hiện tại
                                        <b class="total3Month">0</b>₫
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #299421!important;width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <span class="progress-label">40,000,000₫</span>
                                <span class="progress-status">200,000,000₫</span>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="level-dlc1" style="padding: 20px;">
                                <div class="reward" style="color:#bf9235">
                                    <div class="reward-icon">
                                        <img src="https://forvietvn.com/Content/Forviet/img/dlc1.png">
                                    </div>
                                    <div class="reward-content">Đại lý cấp 1</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Doanh số 3 tháng hiện tại
                                        <b class="total3Month">0</b>₫
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #bf9235!important;width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <span class="progress-label">200,000,000₫</span>
                                <span class="progress-status">400,000,000₫</span>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="level-tdl" style="padding: 20px;">
                                <div class="reward" style="color:#ff6666">
                                    <div class="reward-icon">
                                        <img src="https://forvietvn.com/Content/Forviet/img/dlc1.png">
                                    </div>
                                    <div class="reward-content">Tổng đại lý</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Số TĐL cấp dưới:
                                        <b>0</b>
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #ff6666!important;width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <span class="progress-label">0 TĐL</span>
                                <span class="progress-status">4 TĐL</span>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="level-npp" style="padding: 20px;">
                                <div class="reward" style="color:#bf4d35">
                                    <div class="reward-icon">

                                        <img src="https://forvietvn.com/Content/Forviet/img/dlc1.png">
                                    </div>
                                    <div class="reward-content">Nhà phân phối</div>
                                    <div class="reward-content fullName"> doan thi ngoc diep </div>
                                    <div class="reward-amount">
                                        Số TĐL cấp dưới:
                                        <b>0</b>
                                    </div>
                                </div>
                                <span class="progress-label">0%</span>
                                <span class="progress-status">100%</span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="background: #bf4d35!important;width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <span class="progress-label">0 TĐL</span>
                                <span class="progress-status">4 TĐL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 col-12">

            <div class="ms-panel ms-crypto-orders">
                <div class="ms-panel-header">
                    <div class="d-flex justify-content-between">
                        <div class="ms-header-text">
                            <h6>Hoa hồng gần đây</h6>
                        </div>
                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover hide-thead">
                            <thead>
                                <tr class="table-items">
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Số tiền (₫)</th>
                                    <th scope="col">Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Thưởng trực tiếp 3% t? nhathuy</td>
                                    <td>117,120 ₫</td>
                                    <td>30/04/2021 06:56</td>
                                </tr>
                                <tr>
                                    <td>Hoa hồng chênh lệch cấp đại lý</td>
                                    <td>95,200 ₫</td>
                                    <td>30/04/2021 06:38</td>
                                </tr>
                                <tr>
                                    <td>Hoa hồng chênh lệch cấp đại lý</td>
                                    <td>200,000 ₫</td>
                                    <td>30/04/2021 06:38</td>
                                </tr>
                                <tr>
                                    <td>Hoa hồng đồng danh hiệu tầng 1: 0.5%</td>
                                    <td>19,520 ₫</td>
                                    <td>30/04/2021 06:38</td>
                                </tr>
                                <tr>
                                    <td>Hoa hồng doanh số cá nhân 10%</td>
                                    <td>192,000 ₫</td>
                                    <td>27/04/2021 22:04</td>
                                </tr>
                                <tr>
                                    <td>Hoa hồng doanh số cá nhân 5%</td>
                                    <td>1,900,000 ₫</td>
                                    <td>27/04/2021 22:04</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class=" ms-widget ms-panel-fh">

                        <div class="ms-panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="w_chartper">

                                        <div id="chart_div">
                                            <div style="position: relative;">
                                                <div dir="ltr" style="position: relative; width: 762px; height: 400px;">
                                                    <div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="762" height="400" aria-label="A chart." style="overflow: hidden;">
                                                            <defs id="_ABSTRACT_RENDERER_ID_0">
                                                                <clipPath id="_ABSTRACT_RENDERER_ID_1">
                                                                    <rect x="131" y="77" width="500" height="247"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect x="0" y="0" width="762" height="400" stroke="none" stroke-width="0" fill="#ffffff"></rect>
                                                            <g>
                                                                <rect x="328" y="43" width="105" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                                                                <g>
                                                                    <rect x="328" y="43" width="105" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                                                                    <g><text text-anchor="start" x="359" y="54.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">Doanh số (₫)</text></g>
                                                                    <rect x="328" y="43" width="26" height="13" stroke="none" stroke-width="0" fill="#0596d8"></rect>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <rect x="131" y="77" width="500" height="247" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                                                                <g clip-path="url(https://forvietvn.com/dashboard#_ABSTRACT_RENDERER_ID_1)">
                                                                    <g>
                                                                        <rect x="131" y="323" width="500" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                                                        <rect x="131" y="262" width="500" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                                                        <rect x="131" y="200" width="500" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                                                        <rect x="131" y="139" width="500" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                                                        <rect x="131" y="77" width="500" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                                                        <rect x="131" y="292" width="500" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
                                                                        <rect x="131" y="231" width="500" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
                                                                        <rect x="131" y="169" width="500" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
                                                                        <rect x="131" y="108" width="500" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
                                                                    </g>
                                                                    <g>
                                                                        <rect x="163" y="200" width="103" height="0.5" stroke="none" stroke-width="0" fill="#0596d8"></rect>
                                                                        <rect x="330" y="200" width="102" height="0.5" stroke="none" stroke-width="0" fill="#0596d8"></rect>
                                                                        <rect x="496" y="200" width="103" height="0.5" stroke="none" stroke-width="0" fill="#0596d8"></rect>
                                                                    </g>
                                                                    <g>
                                                                        <rect x="131" y="200" width="500" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
                                                                    </g>
                                                                </g>
                                                                <g></g>
                                                                <g>
                                                                    <g><text text-anchor="middle" x="214.66666666666669" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">12</text></g>
                                                                    <g><text text-anchor="middle" x="381" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">01</text></g>
                                                                    <g><text text-anchor="middle" x="547.3333333333334" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">02</text></g>
                                                                    <g><text text-anchor="end" x="118" y="328.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">-1.0</text></g>
                                                                    <g><text text-anchor="end" x="118" y="266.55" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">-0.5</text></g>
                                                                    <g><text text-anchor="end" x="118" y="205.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">0.0</text></g>
                                                                    <g><text text-anchor="end" x="118" y="143.55" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">0.5</text></g>
                                                                    <g><text text-anchor="end" x="118" y="82.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">1.0</text></g>
                                                                </g>
                                                            </g>
                                                            <g></g>
                                                        </svg>
                                                        <div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Element</th>
                                                                        <th>Doanh số (₫)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>12</td>
                                                                        <td>0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>01</td>
                                                                        <td>0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>02</td>
                                                                        <td>0</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 772px; white-space: nowrap; font-family: Arial; font-size: 13px;">Doanh số (₫)</div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="per-detail">
                                        <div class="year-header related d-flex">
                                            <div class="m">Tháng</div>

                                            <div class="m">12</div>
                                            <div class="m">01</div>
                                            <div class="m">02</div>

                                            <div class="m">Tổng</div>
                                        </div>
                                        <div class="per-item ">
                                            <div class="year resetChart d-flex">
                                                <div class="m text-primary">Số tiền</div>

                                                <div class="m text-success">0</div>
                                                <div class="m text-success">0</div>
                                                <div class="m text-success">0</div>

                                                <div class="m text-success">0</div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        $(".total3Month").text('0');
                                    </script>
                                </div>
                            </div>
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