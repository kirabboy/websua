@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">



        <div class="col-lg-12">

            <table class="table table-bordered tb-c text-center">
                <thead class="">
                    <tr>
                        <th>Tên sản phẩm</th>

                        <th style="white-space: nowrap" class="hidden-xs">Giá</th>
                        <th style="white-space: nowrap" class="text-center"> <span class="c-visible" style="color:black">Giá/</span>Số lượng</th>
                        <th style="white-space: nowrap">Thành tiền</th>
                        <th style="white-space: nowrap"><span class="hidden-xs">Hành động</span></th>
                    </tr>
                </thead>
                <tbody class="c-tbody">

                    <tr>
                        <td class="cart-item clearfix">
                            <div class="img">
                                <a href="/phoi-mam-dau-nanh-soygerm-60-vien" title="Phôi Mầm Đậu Nành SOYGERM 60 viên" class="img-cover">
                                    <img src="https://forvietvn.com/Uploads/Mediums/2020/8/14/20200814110650_soy.jpg" alt="Phôi Mầm Đậu Nành SOYGERM 60 viên" title="Phôi Mầm Đậu Nành SOYGERM 60 viên">
                                </a>
                            </div>
                            <div class="desc">
                                <h3 class="name">
                                    <a href="/phoi-mam-dau-nanh-soygerm-60-vien" title="Phôi Mầm Đậu Nành SOYGERM 60 viên">Phôi Mầm Đậu Nành SOYGERM 60 viên</a>
                                </h3>
                            </div>
                        </td>
                        <td class="td-responsive  hidden-xs" data-title="Giá:" style="white-space: nowrap">
                            <div class="tlt_left hidden-xs">
                                <span>Giá</span>
                            </div>
                            <div class="wrap price right-mobile">
                                200,000 ₫
                            </div>

                        </td>
                        <td class="td-responsive text-center" data-title="Số lượng:">
                            <div class="wrap price right-mobile visible-xs">
                                200,000 ₫
                            </div>
                            <div class="tlt_left">
                                <span>Số lượng</span>
                            </div>
                            <div class="wrap number wan-spinner wan-spinner-detail-pro right-mobile">
                                <a href="#" class="minus">-</a>
                                <input type="text" data-quantity="1" id="item_15" onchange="updateCart('15','1','Phôi Mầm Đậu Nành SOYGERM 60 viên')" data-price="200000" data-namesub="soy - Phôi Mầm Đậu Nành SOYGERM 60 viên" data-idsub="15" value="1" class="total-mask form-control bfh-number">
                                <a href="#" class="plus">+</a>

                            </div>
                        </td>
                        <td class="td-responsive price " data-title="Thành tiền:" style="white-space: nowrap;">
                            <div class="tlt_left hidden-xs">
                                <span>Thành tiền </span>
                            </div>
                            <div class="wrap right-mobile">200,000 ₫</div>
                        </td>
                        <td class="td-responsive price" data-title="Thành tiền:" style="white-space: nowrap;">
                            <button type="button" class="lnt-product-remove" onclick="deleteFromCartReload(15,1,'Phôi Mầm Đậu Nành SOYGERM 60 viên')">Xóa</button>
                        </td>
                    </tr>
                    <tr style="background-color: #f9f9fa" class="tr_total c-bg">
                        <td class="">
                            <b style="font-size: 16px; font-weight: 700" class="">Tổng (DS)</b><br>
                        </td>
                        <td> Số lượng: 1</td>
                        <td class="hidden-xs"></td>

                        <td style="vertical-align: middle">
                            <b class="right-mobile" style="font-size: 17px; white-space: nowrap">
                                200,000 ₫
                            </b>
                        </td>
                        <td class=""></td>

                    </tr>
                    <tr style="background-color: #f9f9fa" class="tr_total c-bg">
                        <td class="">
                            <b style="font-size: 16px; font-weight: 700" class="">Tích doanh số</b><br>
                        </td>
                        <td> -20% </td>
                        <td class="hidden-xs"></td>

                        <td style="vertical-align: middle">
                            <b class="right-mobile" style="font-size: 17px; white-space: nowrap">
                                160,000 ₫
                            </b>
                        </td>
                        <td class=""></td>

                    </tr>
                    <tr style="background-color: #f9f9fa" class="tr_total">
                        <td class="">
                            <b style="font-size: 16px; font-weight: 700" class="">Tổng tiền (TT)</b><br>
                        </td>

                        <td>5 % VAT(10,000)</td>
                        <td class="hidden-xs"></td>

                        <td class="color-red" style="vertical-align: middle">
                            <b class="" style="font-size: 17px; white-space: nowrap">
                                210,000 ₫
                            </b>
                        </td>
                        <td class=""></td>
                    </tr>


                </tbody>
            </table>
            <div style="margin: 10px 0" class="c-txt">
                <textarea rows="5" name="content" class="form-control" placeholder="ghi chú"></textarea>
            </div>
            <div class="c-txt">
                <b style="font-size: 16px; font-weight: 700" class="">Chọn trung tâm cần chuyển khoản </b>
                <select id="AgencyId" name="AgencyId" class="form-control">
                    <option value="0">Chọn trung tâm</option>
                    <option value="1">Tổng Công Ty</option>
                    <option value="2">Trung Tâm Phân Phối Hà Nội 01</option>
                    <option value="3">Trung Tâm Phân Phối Sài Gòn 01</option>
                    <option value="4"> Trung Tâm Phân Phối Bắc Giang 01</option>
                    <option value="5">Trung Tâm Phân Phối Hải Dương 01</option>
                    <option value="6">Trung tâm Phân Phối Vĩnh Phúc 01</option>
                    <option value="7">Trung Tâm Phân Phối Phú Yên 01</option>
                    <option value="8">Trung Tâm Phân Phối Hà Nam 01</option>
                    <option value="9">Trung Tâm Phân Phối Phú Thọ 02</option>
                    <option value="10">Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01 </option>
                    <option value="11">Trung Tâm Phân Phối Ba Vì - Hà Nội 68</option>
                    <option value="12">Trung Tâm Phân Phối Lâm Đồng 01</option>
                    <option value="13">Trung Tâm Phân Phối Sài Gòn 02</option>
                    <option value="14">Trung Tâm Phân Phối Bình Thuận 02</option>
                    <option value="15">Trung Tâm Phân Phối Đồng Nai 01</option>
                    <option value="16">Trung Tâm Phân Phối Sài Gòn 03</option>
                    <option value="17">Trung Tâm Phân Phối Hà Nội 03</option>
                    <option value="18">Trung Tâm Phân Phối Khánh Hòa 01</option>
                    <option value="19">Trung Tâm Phân Phối Ninh Bình 01</option>
                    <option value="20">Trung Tâm Phân Phối Thanh Hóa 03</option>
                    <option value="21">Trung Tâm Phân Phối Thanh Hóa 02</option>
                    <option value="22">Trung Tâm Phân Phối Hòa Bình 01</option>
                    <option value="23">Trung Tâm Phân Phối Sài Gòn 01</option>
                    <option value="24">Trung Tâm Phân Phối Bình Thuận 01 </option>
                    <option value="25">Trung Tâm Phân Phối Thanh Hóa 01</option>
                    <option value="26">Trung Tâm Phân Phối Phú Thọ 01</option>
                    <option value="27">Trung Tâm Phân Phối Nghê An 01</option>
                    <option value="28">Trung Tâm Phân Phối Bắc Ninh 01</option>
                    <option value="29">Trung Tâm Phân Phối Hà Nội 02</option>
                    <option value="30">Trung Tâm Phân Phối Hà Nội 01</option>
                    <option value="31">Trung Tâm Phân Phối Vũng Tàu 01</option>
                    <option value="32">Trung Tâm Phân Phối Bình Phước</option>
                </select>
            </div>
            <div id="infoBank">

            </div>
            <div>
                <a href="#" id="btnPay" class="btn btn-danger" style="font-size: 16px; font-weight: 500; padding: 8px 15px ;margin:10px auto;display:block;width: 200px;color:yellow">Gửi đơn hàng</a>
            </div>
       
        </div>
    </div>
</div>

@endsection