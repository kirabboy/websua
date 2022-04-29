@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        @if(Cart::count() > 0)
        <div class="col-lg-12">
            <table class="table table-bordered tb-c text-center">
                <thead class="">
                    <tr>
                        <th>Tên sản phẩm</th>

                        <th style="white-space: nowrap" class="hidden-xs">Giá</th>
                        <th style="white-space: nowrap" class="text-center">Số lượng</th>
                        <th style="white-space: nowrap">Thành tiền</th>
                        <th style="white-space: nowrap"><span class="hidden-xs">Hành động</span></th>
                    </tr>
                </thead>
                <tbody class="c-tbody">
                    @foreach ($carts as $cart)
                    <tr>
                        <td class="cart-item clearfix">
                            <div class="img">
                                <a href="/phoi-mam-dau-nanh-soygerm-60-vien" title="" class="img-cover">
                                    <img src="{{url('/public/image')}}/{{$cart->options->image}}"></a>
                                </a>
                            </div>
                            <div class="desc">
                                <h3 class="name">
                                    <a href="#" title="{{$cart->name}}">{{$cart->name}}</a>
                                </h3>
                            </div>
                        </td>
                        <td class="td-responsive  hidden-xs" data-title="Giá:" style="white-space: nowrap">
                            <!-- <div class="tlt_left hidden-xs">
                                <span>Giá</span>
                            </div> -->
                            <div class="wrap price right-mobile">
                                {{number_format($cart->price)}} ₫
                            </div>

                        </td>
                        <td class="td-responsive text-center pl-0 pr-0" data-title="Số lượng:">
                            <!-- <div class="wrap price right-mobile visible-xs">
                                {{$cart->price}} ₫
                            </div> -->
                            <!-- <div class="tlt_left">
                                <span>Số lượng</span>
                            </div> -->
                            <div class="wrap number wan-spinner wan-spinner-detail-pro right-mobile">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input aria-label="quantity" class="input-qty"
                                        type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="td-responsive price " data-title="Thành tiền:" style="white-space: nowrap;">
                            <!-- <div class="tlt_left hidden-xs">
                                <span>Thành tiền </span>
                            </div> -->
                            <div class="wrap right-mobile"> {{number_format($cart->price*$cart->qty)}} ₫</div>
                        </td>
                        <td class="td-responsive price" data-title="Thành tiền:" style="white-space: nowrap;">
                            <a href="./gio-hang/delete/{{$cart->rowId}}" class="btn btn-danger btn-icon-split">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                    
                    <tr style="background-color: #f9f9fa" class="tr_total">
                        <td class="">
                            <b style="font-size: 16px; font-weight: 700" class="">Tổng tiền (TT)</b><br>
                        </td>

                        <td>5 % VAT(10,000)</td>
                        <td class="hidden-xs"></td>

                        <td class="color-red" style="vertical-align: middle">
                            <b class="" style="font-size: 17px; white-space: nowrap">
                                {{$subtotal}} ₫
                            </b>
                        </td>
                        <td class=""></td>
                    </tr>


                </tbody>
            </table>
            <div>
                <!-- <a href="{{url('/thanh-toan')}}" id="btnPay" class="btn btn-primary" style="font-size: 16px; font-weight: 500; padding: 8px 15px ;margin:10px auto;display:block;width: 200px;color:white">GỬI ĐƠN HÀNG</a> -->
            </div>
<!--             <div style="margin: 10px 0" class="c-txt">
                <textarea rows="5" name="content" class="form-control" placeholder="ghi chú"></textarea>
            </div> -->
<!--             <div class="c-txt">
                <b style="font-size: 16px; font-weight: 700" class="">Chọn trung tâm cần chuyển khoản </b>
                <select id="AgencyId" name="AgencyId" class="form-control">
                    <option value="0">Chọn trung tâm</option>
                    @foreach ($trungtam_phanphoi as $value)
                        <option value="{{$value->id}}">
                            {{$value->tentrungtam}}</option>
                    @endforeach
                </select>
            </div> -->
            
            <div>
                <a href="{{url('/thanh-toan')}}" id="btnPay" class="btn btn-danger" style="font-size: 16px; font-weight: 500; padding: 8px 15px ;margin:10px auto;display:block;width: 200px;color:yellow">GỬI ĐƠN HÀNG</a>
            </div>


        </div>
        @else
        <div class="col-12 text-center">
            <h3>Giỏ hàng hiện tại của bạn đang trống</h3>
            <a class="btn btn-danger text-white" href="{{url('/dat-hang')}}">Đặt hàng ngay</a>
        </div>
        @endif
    </div>
</div>


@endsection