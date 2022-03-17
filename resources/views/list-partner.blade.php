@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<div class="container-fluid">
    <div class="box-partner">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu1">Danh sách đối tác</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#home">Danh sách đại lý của đối tác</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="row tab-pane " id="home">
                <div class="col-md-12" id="viewTree1">
                    <div class="widget">
                        <div class="widget-body np clearfix" id="widget-genealogy">
                            <form id="frmSearchTree">
                                <table class="table table-bordered table-striped" id="searchTree">
                                    <tbody>
                                        <tr>
                                            <td>Từ khóa </td>
                                            <td colspan="3">
                                                <input type="text" id="KeywordTree" class="form-control" name="Keyword">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary text-light" id="btnFillTree">Tìm kiếm</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="col-xs-12 col-sm-12 col-md-12 zay-right" id="Zay_Right">
                                <div class="right">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-xs-12 tree-handle ml-4">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn-lg btn-default btn-expand-all" data-title="Mở tất cả." data-original-title="" title="">
                                                        <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                                                    </button>
                                                    <button class="btn-lg btn-default btn-hide-all" data-title="Đóng tất cả." data-original-title="" title="">
                                                        <i class="fa-solid fa-down-left-and-up-right-to-center"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="treeDiagram" class="tree-horizontal">
                                            <ul>
                                                <li><a><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                                                        </svg><!-- <span class="fa fa-user"></span> -->&nbsp;<span class="popover-dismiss" data-toggle="popover" data-placement="right" data-title=" vo thi kiem " data-content="<b>Tên đăng nhập:</b> vokiem<br/><b>Doanh số:</b> <br/><b>Địa chỉ:</b> 346 / huynh ngoc mai ap 4 huong tho phu <br/>" data-original-title="" title="">vokiem - vo thi kiem <i class="text-danger"></i></span></a>
                                                    <ul></ul>
                                                </li>
                                                <li><a><svg class="svg-inline--fa fa-minus-square fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="minus-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM92 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H92z"></path>
                                                        </svg><!-- <span class="fa fa-minus-square"></span> -->&nbsp;<span class="popover-dismiss" data-toggle="popover" data-placement="right" data-title="nguyen nhat huy " data-content="<b>Tên đăng nhập:</b> nhathuy<br/><b>Cập bậc:</b> Đại lý bán lẻ<br/><b>Doanh số:</b> 3,904,000<br/><b>Địa chỉ:</b> tan thuan , tan hoi dong ,chau thanh , tien giang .<br/>" data-original-title="" title="">nhathuy - nguyen nhat huy <i class="text-danger">Đại lý bán lẻ</i></span></a>
                                                    <ul>
                                                        <li><a><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                                                                </svg><!-- <span class="fa fa-user"></span> -->&nbsp;<span class="popover-dismiss" data-toggle="popover" data-placement="right" data-title="pham thi bich nga " data-content="<b>Tên đăng nhập:</b> phamthibichnga<br/><b>Doanh số:</b> <br/><b>Địa chỉ:</b> ap tan thuan tan hoi dong chau thanh tien giang <br/>" data-original-title="" title="">phamthibichnga - pham thi bich nga <i class="text-danger"></i></span></a>
                                                            <ul></ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tab-pane active" id="menu1">
                <div class="col-sm-12">
                    <div>
                        <form id="frmSearch">
                            <table class="table table-bordered table-striped" id="searchTable">
                                <tbody>
                                    <tr>
                                        <td>Từ khóa </td>
                                        <td colspan="3">
                                            <input type="text" id="Keyword" class="form-control" name="Keyword">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Từ thời gian</td>
                                        <td><input type="date" id="FromDate" autocomplete="off" class="form-control" name="FromDate">
                                            <svg style="margin: -25px 5px; float: right;" class="svg-inline--fa fa-calendar fa-w-14 glyphicon glyphicon-calendar" aria-hidden="true" data-prefix="fa" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path>
                                            </svg><!-- <i style="margin: -25px 5px; float: right;" class="glyphicon glyphicon-calendar fa fa-calendar"></i> -->
                                        </td>
                                        <td>Đến thời gian</td>
                                        <td>
                                            <input type="date" id="ToDate" autocomplete="off" class="form-control" name="ToDate">
                                            <svg style="margin: -25px 5px; float: right;" class="svg-inline--fa fa-calendar fa-w-14 glyphicon glyphicon-calendar" aria-hidden="true" data-prefix="fa" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path>
                                            </svg><!-- <i style="margin: -25px 5px; float: right;" class="glyphicon glyphicon-calendar fa fa-calendar"></i> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cấp bậc</td>
                                        <td>
                                            <select id="RankType" name="RankType" class="form-control">
                                                <option value="">Tất cả</option>
                                                <option value="1">CỘNG TÁC VIÊN</option>
                                                <option value="2">Đại lý Bán Lẻ</option>
                                                <option value="3">Đại lý Bán Buôn</option>
                                                <option value="4">Đại Lý Cấp 1</option>
                                                <option value="5">Tổng Đại Lý</option>
                                                <option value="6">Nhà Phân Phôi</option>
                                            </select>
                                        </td>
                                        <td>Hoạt động</td>
                                        <td>
                                            <select id="IsDeposit" name="IsDeposit" class="form-control">
                                                <option value="">Tất cả</option>
                                                <option value="0">Không hoạt động</option>
                                                <option value="1">Có hoạt động</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="4">
                                            <a class="btn btn-primary text-light" id="btnFill">Tìm kiếm</a>
                                            <a class="btn btn-primary text-light" id="btnExport">Xuất file</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
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
                                                    <th style="width: 4.51%;">#</th>
                                                    <th data-col-seq="3" style="width: 8.21%;">Người giới thiệu</th>
                                                    <th data-col-seq="2" style="width: 15.8%;"><a href="javascript:void(0)" data-sort="username">ID Đại lý</a></th>
                                                    <th data-col-seq="3" style="width: 8.21%;">Họ tên</th>
                                                    <th data-col-seq="4" style="width: 11.83%;">Điện thoại</th>
                                                    <th data-col-seq="5" style="width: 7.31%;" class="text-center"><a href="javascript:void(0)" data-sort="level">Cấp</a></th>
                                                    <th data-col-seq="6" style="width: 8.85%;"><a href="javascript:void(0)" data-sort="created_at">Thời gian đăng ký</a></th>


                                                    <th data-col-seq="10" style="width: 8.58%;"><a href="javascript:void(0)" data-sort="flags">Hoạt động?</a></th>
                                                </tr>


                                            </thead>
<!-- Data user here -->
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>nhathuy</td>
                                                    <td>phamthibichnga</td>
                                                    <td>pham thi bich nga </td>
                                                    <td>0355645181.</td>
                                                    <td><span class="label-color c-label" style=""></span></td>
                                                    <td>27/04/2021 21:48</td>

                                                    <td data-col-seq="10">

                                                        <span class="label-color" style="background:crimson;">
                                                            <svg class="svg-inline--fa fa-times-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                                            </svg><!-- <i class="fa fa-times-circle"></i> -->

                                                        </span>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>ngocdiep1</td>
                                                    <td>nhathuy</td>
                                                    <td>nguyen nhat huy </td>
                                                    <td>0385464679..</td>
                                                    <td><span class="label-color c-label" style="background:#bf4d35">Đại lý Bán Lẻ</span></td>
                                                    <td>27/04/2021 21:44</td>

                                                    <td data-col-seq="10">

                                                        <span class="label-color" style="background:#b2c74d;">
                                                            <svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                            </svg>
                                                        </span>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>ngocdiep1</td>
                                                    <td>vokiem</td>
                                                    <td> vo thi kiem </td>
                                                    <td>0374475853..</td>
                                                    <td><span class="label-color c-label" style=""></span></td>
                                                    <td>27/04/2021 21:31</td>

                                                    <td data-col-seq="10">

                                                        <span class="label-color" style="background:crimson;">
                                                            <svg class="svg-inline--fa fa-times-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                                            </svg><!-- <i class="fa fa-times-circle"></i> -->

                                                        </span>

                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
<!-- End Data user -->
                                        <div class="bottom-pager">
                                            <div class="left">
                                                <a class="first-disable" title="First page"></a>
                                                <a class="pre-disable" title="Previous"></a>
                                                <span>Page</span>
                                                <input type="text" name="page" value="1">
                                                <input type="hidden" value="1">
                                                <span>/1</span>
                                                <a class="next-disable" title="Next"></a>
                                                <a class="last-disable" title="Last page"></a>
                                            </div>
                                            <div class="right">
                                                <span>Amount results per page:
                                                    <select name="RowPerPage">
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                        <option value="35">35</option>
                                                        <option value="40">40</option>
                                                        <option value="45">45</option>
                                                        <option value="50">50</option>
                                                        <option value="55">55</option>
                                                        <option value="60">60</option>
                                                        <option value="65">65</option>
                                                        <option value="70">70</option>
                                                        <option value="75">75</option>
                                                        <option value="80">80</option>
                                                        <option value="85">85</option>
                                                        <option value="90" selected="">90</option>
                                                        <option value="95">95</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </span>

                                                <span>/ Totally: 3</span>
                                            </div>
                                        </div>
                                        <script></script>
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