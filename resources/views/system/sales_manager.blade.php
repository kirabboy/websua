@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<section class="content">
    <div class="form-group col-md-11">
        <form id="frmSearch">
            <table class="table table-bordered table-striped">
                
                <tbody><tr>
                    <td>Tên đăng nhập: </td>
                    <td>
                        <input type="text" id="Keyword" class="form-control" name="Keyword">
                    </td>
                    
                    <td>Trạng thái: </td>
                    <td>
                        <select id="Status" name="Status" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="0">Chờ duyệt</option>
                            <option value="1">Đã duyệt</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chọn ngày từ: </td>
                    <td><input type="date" id="FromDate" autocomplete="off" class="form-control" name="FromDate"> </td>
                    <td>Chọn ngày đến: </td>
                    <td><input type="date" id="ToDate" autocomplete="off" class="form-control" name="ToDate"></i> </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-center">
                        <a class="btn btn-success" id="btnFill">Tìm kiếm</a>
                            <a class="btn btn-success" id="btnAdd">Thêm mới</a>

                        <a class="btn btn-success" id="btnExcel">Xuất ra Excel</a>
                    </td>
                </tr>
            </tbody></table>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12" id="Griditems">

<div class="box" id="gridItems">
    <div class="box-body table-responsive">
        <table id="tblContent" class="table table-bordered table-striped">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ và tên </th>
                    <th>Số ĐT</th>
                    <th>Số tiền</th>
                    <th>Số tiền (VAT)</th>
                    <th>TG đặt hàng</th>
                    <th>TG duyệt</th>
                    <th>Trạng thái</th>
                    <th>TT duyệt đơn</th>
                    <th>Người duyệt đơn</th>
                    <th>Nội dung</th>
                    <th class="act_delete noexport" style="width: 20% !important;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Thao tác <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                    <li><a href="#hideAll" class="hideAll" title="Khóa tài khoản đã chọn"><i class="fa fa-exclamation"></i><span>Khóa</span></a></li>
                                                                    <li><a href="#deleteAll" title="Xóa danh sách đã chọn" class="deleteAll"><i class="fa fa-trash"></i><span>Xóa</span></a></li>
                            </ul>
                        </div>
                    </th>
                </tr>
            </thead>

                <tbody>
                    <tr>
                        <td>6494</td>
                        <td class="uppercase">TRONGDANBL</td>
                        <td class="uppercase">TRONG DAN VU</td>
                        <td class="uppercase">0984465061</td>
                        <td>16,112,000</td>
                        <td>18,797,333</td>
                        <td>28/02/2022 20:57</td>
                        <td>28/02/2022 20:57</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>BP01</td>
                        <td class="text-center">
                            
                        </td>
                        <td class="act_delete  noexport" style="text-align: right">


                                <a href="#6494" class="viewDetailCommission" title="Chi tiết hoa hồng"><i class="fa fa-info" aria-hidden="true"></i></a>

                                <a href="#6494" class="active" title="Đã nhận">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                                        <a href="#6494" class="viewDetail" title="Chi tiết đơn hàng"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>6491</td>
                        <td class="uppercase">VT686868</td>
                        <td class="uppercase">Trần Ngọc ÁNh </td>
                        <td class="uppercase">0329385699</td>
                        <td>2,128,000</td>
                        <td>2,482,667</td>
                        <td>28/02/2022 20:18</td>
                        <td>28/02/2022 20:18</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>BP01</td>
                        <td class="text-center">
                            
                        </td>
                        <td class="act_delete  noexport" style="text-align: right">


                                <a href="#6491" class="viewDetailCommission" title="Chi tiết hoa hồng"><i class="fa fa-info" aria-hidden="true"></i></a>

                                <a href="#6491" class="active" title="Đã nhận">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                                        <a href="#6491" class="viewDetail" title="Chi tiết đơn hàng"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                  
                    <tr>
                        <td>6485</td>
                        <td class="uppercase">TRINHVANTHANG</td>
                        <td class="uppercase">Trịnh Văn Thắng</td>
                        <td class="uppercase">0335727927</td>
                        <td>13,984,000</td>
                        <td>16,314,667</td>
                        <td>28/02/2022 15:35</td>
                        <td>28/02/2022 15:35</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>BP01</td>
                        <td class="text-center">
                            
                        </td>
                        <td class="act_delete  noexport" style="text-align: right">


                                <a href="#6485" class="viewDetailCommission" title="Chi tiết hoa hồng"><i class="fa fa-info" aria-hidden="true"></i></a>

                                <a href="#6485" class="active" title="Đã nhận">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                                        <a href="#6485" class="viewDetail" title="Chi tiết đơn hàng"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>6484</td>
                        <td class="uppercase">DANGVANHOCBD</td>
                        <td class="uppercase">ĐĂNG VĂN HOC</td>
                        <td class="uppercase">0919358788.</td>
                        <td>24,320,000</td>
                        <td>28,373,333</td>
                        <td>28/02/2022 15:29</td>
                        <td>28/02/2022 15:29</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>BP01</td>
                        <td class="text-center">
                            
                        </td>
                        <td class="act_delete  noexport" style="text-align: right">


                                <a href="#6484" class="viewDetailCommission" title="Chi tiết hoa hồng"><i class="fa fa-info" aria-hidden="true"></i></a>

                                <a href="#6484" class="active" title="Đã nhận">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                                        <a href="#6484" class="viewDetail" title="Chi tiết đơn hàng"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>6483</td>
                        <td class="uppercase">huynhkimtruc</td>
                        <td class="uppercase">HUỲNH THỊ KIM TRÚC</td>
                        <td class="uppercase">0908725535..</td>
                        <td>13,072,000</td>
                        <td>15,250,667</td>
                        <td>28/02/2022 15:25</td>
                        <td>28/02/2022 15:25</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>BP01</td>
                        <td class="text-center">
                            
                        </td>
                        <td class="act_delete  noexport" style="text-align: right">


                                <a href="#6483" class="viewDetailCommission" title="Chi tiết hoa hồng"><i class="fa fa-info" aria-hidden="true"></i></a>

                                <a href="#6483" class="active" title="Đã nhận">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                                        <a href="#6483" class="viewDetail" title="Chi tiết đơn hàng"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    
                 
                </tbody>

        </table>
<div class="bottom-pager">
    <div class="left">
        <a href="javascript:;" class="first-disable" title="First page"></a>
        <a href="javascript:;" class="pre-disable" title="Previous"></a>
        <span>Page</span>
        <input type="text" name="page" value="1">
        <input type="hidden" value="3">
        <span>/3</span>
        <a href="#Keyword=&amp;CategoryID=0&amp;SearchIn=&amp;RowPerPage=20&amp;Field=&amp;FieldOption=1&amp;Page=2" class="next" title="Next"></a>
        <a href="#Keyword=&amp;CategoryID=0&amp;SearchIn=&amp;RowPerPage=20&amp;Field=&amp;FieldOption=1&amp;Page=3" class="last" title="Last page"></a>
    </div>
    <div class="right">
        <span>Amount results per page:</span>
        <select name="RowPerPage">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20" selected="">20</option>
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
            <option value="90">90</option>
            <option value="95">95</option>
            <option value="100">100</option>
        </select>
        <span>/ Totally: 51</span>
    </div>
</div>
<script></script>    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="popupImgDetailView" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body modalbd_ed">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div id="popupImgDetail">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupOrderDetailView" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body modalbd_ed">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="detail-order" id="popupOrderDetail">

                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #modalpopup .modal-content {
        border-radius: 0;
        background: #9b5903;
        color: #fff;
    }

    #modalpopup .modal-dialog {
        margin: 7vh auto;
        z-index: 99999999;
    }

    #modalpopup .close {
        color: #fff;
    }

    #modalpopup .modalbd_ed {
        padding: 30px;
    }

    .modal-content {
        overflow: visible !important;
    }

    button.close {
        position: absolute;
        right: -15px;
        top: -15px;
        height: 35px;
        width: 35px;
        background: #ffd400;
        line-height: 35px;
        z-index: 99999;
        opacity: 1;
    }

    .modal-body.modalbd_ed {
        overflow-y: visible !important;
    }

    .modal-backdrop.in {
        opacity: 0;
    }

    .act_delete a, .act a {
        display: inline-block;
        padding: 5px;
        border-radius: 3px;
        margin: 2px;
        width: 30px;
        height: 30px;
        text-align: center;
        vertical-align: middle;
        line-height: 22px;
        border: 1px solid #ccc;
        transition: ease 0.3s;
    }
    .box-body {
        padding: 20px;
        width: 100%;
    }
</style>
<script>
    $(function () {
        registerGridView('#gridItems');
        $(".viewDetail").click(function (e) {
            e.preventDefault();
            var val = $(this).attr("href").substring(1);
            $.ajax({
                type: "GET",
                url: "/ajax/member/OrderDetail",
                data: { investId: val },
                success: function (data) {
                    $("#popupOrderDetail").html(data);
                    $('#popupOrderDetailView').modal('show');
                }
            });
        });
        $("#btnAdd").click(function (e) {
            e.preventDefault();
            ModalADC.Open({
                title: "Thêm mới nhà đầu tư",
                urlLoad: urlForm + '?do=Add',
                bottom: false
            });
        });
        $(".viewDetailCommission").click(function (e) {
            e.preventDefault();
            var val = $(this).attr("href").substring(1);
            e.preventDefault();
            ModalADC.Open({
                title: "Thông tin hoa hồng",
                urlLoad: "/Admin-36627d43/HistoryInvestment/AjaxDetailTransaction?investId=" + val,
                bottom: false
            });
            //$.ajax({
            //    type: "GET",
            //    url: "/ajax/HistoryInvestment/AjaxDetailTransaction",
            //    data: { investId: val },
            //    success: function (data) {
            //        $("#popupOrderDetail").html(data);
            //        $('#popupOrderDetailView').modal('show');
            //    }
            //});
        });

        $(".viewImg").click(function (e) {
            e.preventDefault();
            var val = $(this).data("img");
            var data = '<img src="' + val + '" />';
            $("#popupImgDetail").html(data);
            $('#popupImgDetailView').modal('show');
        });
    })
</script>
</div>
    </div>
</section>
@endsection