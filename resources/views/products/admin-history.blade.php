@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<div class="container-fluid">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="transactions-content widget">
        <div class="widget-head">
            <h4 class="heading">Lịch sử đặt hàng</h4>
        </div>
        <div class="widget-body">
            <!-- <table class="table table-bordered table-striped bangtimkiem">
                <tbody>
                    <tr>
                        <td>Từ thời gian</td>
                        <td><input type="date" class="form-control" value="date"></td>
                    </tr>
                    <tr>
                        <td>Đến thời gian</td>
                        <td><input type="date" class="form-control"></td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">
                            <a class="btn btn-primary">Tìm kiếm</a>
                            <a class="btn btn-primary">Xuất file</a>
                        </td>
                    </tr>
                </tbody>
            </table> -->
            <table class="table table-bordered table-striped table-hover bangthuong text-center ">
                <thead>
                    <tr>
                        <th style="cursor:pointer" >Thời gian mua hàng

                        </th>
                        <th>Họ tên</th>
                        <th>Số tiền</th>
                        <th>Thời gian cập nhật trạng thái</th>
                        <th>Trạng thái</th>
                        <th>Tỉnh</th>
                        <th>Huyện</th>
                        <th>Xã</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $orders as $order)
                    <tr>

                        <td>{{$order->created_at}}</td>
                        <td>{{$order->full_name}}
                        <td>{{$order->test}}
                        </td>
                        <td>{{$order->updated_at}}</td>
                        <td>
                            <a> {{ DB::table('status_product') ->where('id',$order->status)->first()->status_name}}</a>

                        </td>
                        <td>
                            {{ DB::table('province') ->where('matinhthanh',$order->sel_province)->first()->tentinhthanh}}
                        </td>
                        <td>
                            {{ DB::table('district')->where('maquanhuyen',$order->sel_district)->first()->tenquanhuyen}}
                        </td>
                        <td>
                            {{ DB::table('ward')->where('maphuongxa',$order->sel_ward)->first()->tenphuongxa}}
                        </td>
                        <td>
                            {{$order->street_address}}
                        </td>
                        <td>
                            <a class="" href="#" data-toggle="modal" data-target="#create_sales_{{$order->id}}" id="btn_add">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if( $order->status ==1)
                            <button class="editbtn" href="#" value="{{$order->id}}" data-toggle="modal" data-target="#create_{{$order->id}}" id="btn_add">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            @else

                            @endif
                        </td>

                    </tr>
                    @endforeach


                    <!-- <tr>
                        <td class="text-danger">Tổng: </td>
                        <td colspan="1" class="text-danger">
                            <span></span>

                        </td>
                    </tr> -->
                </tbody>
            </table>

            <!-- Model here -->
            @foreach ( $orders as $order)
            <div class="modal fade" id="create_sales_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none !important">
                    <div class="modal-dialog modal-lg">

                        <div id="orderdetailprint" class="modal-content">
                            <h2 style="text-align:center;">Đơn Đặt Hàng</h2>

                            <ul class="list-ifod clearfix">
                                <li>
                                    <p><b>Họ và tên: {{$order->full_name}}</b><span id="fullName">

                                        </span></p>
                                </li>
                                <li>
                                    <p><b>Địa chỉ nhận: {{$order->street_address}}</b><span id="address"></span></p>
                                </li>
                                <!-- <li>
                                            <p><b>Email:</b> <span id="email">ngocdep@gmail.com</span></p>
                                        </li>
                                        <li>
                                            <p><b>Số điện thoại:</b><span id="mobile">0373066558.</span></p>
                                        </li> -->

                                <li>
                                    <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                                </li>
                                <!-- <li>
                                            <p><b>Ghi chú:</b> <span id="note"></span></p>
                                        </li> -->
                            </ul>

                            <table class="table table-bordered table-order" style="border-collapse:collapse;width:100%;">
                                <thead>
                                    <tr>
                                        <td style="width:55%">Tên sản phẩm</td>

                                        <td style="width:15%">Giá</td>
                                        <td style="width:15%">Số lượng</td>
                                        <td style="width:15%">Thành tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $get_products->where('id_order', $order->id) as $value )
                                    <tr>
                                        <td class="cart-item clearfix">
                                            <div class="img">
                                                <a href="/thuc-duong-giam-can-800gr" title="Thực Dưỡng Giảm Cân 800gr" class="img-cover">
                                                    <img src=" {{url('/public/image')}}/{{ DB::table('products') ->where('id', $value->id_product)->first()->image}}" alt="Thực Dưỡng Giảm Cân 800gr" title="Thực Dưỡng Giảm Cân 800gr" style="width:30px">
                                                </a>
                                            </div>
                                            <div class="desc">
                                                <h3 class="name">
                                                    <a href="/thuc-duong-giam-can-800gr" title="Thực Dưỡng Giảm Cân 800gr">
                                                        {{ DB::table('products') ->where('id', $value->id_product)->first()->name}}
                                                    </a>
                                                </h3>
                                            </div>
                                        </td>

                                        <td class="td-responsive" data-title="Giá:" style="white-space: nowrap">
                                            <div class="wrap price">
                                                {{$value->total}} ₫
                                            </div>
                                        </td>
                                        <td class="td-responsive" data-title="Số lượng:">

                                            <div class="wrap number wan-spinner wan-spinner-detail-pro">
                                                {{$value->qty}}
                                            </div>
                                        </td>
                                        <td class="td-responsive price" data-title="Thành tiền:" style="white-space: nowrap;">
                                            <div class="wrap"> ₫</div>
                                        </td>
                                    </tr>
                                    @endforeach;
                                    <tr style="background-color: #f9f9fa">
                                        <td>
                                            <b style="font-size: 16px; font-weight: 700" class="color-red">Tổng tiền (DS)</b><br>
                                        </td>
                                        <td colspan="2"></td>


                                        <td style="vertical-align: middle">
                                            <b class="color-red" style="font-size: 17px; white-space: nowrap"> {{$order->test}} ₫</b>
                                        </td>
                                    </tr>
                                    <!-- <tr style="background-color: #f9f9fa">
                                                <td>
                                                    <b style="font-size: 16px; font-weight: 700" class="color-red">Tổng tiền (TT)</b><br>
                                                </td>

                                                <td colspan="2">5% VAT(21,000 ₫)</td>

                                                <td style="vertical-align: middle">
                                                    <b class="color-red" style="font-size: 17px; white-space: nowrap">441,000 ₫</b>
                                                </td>
                                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ( $orders as $order)
            <div class="modal fade" id="create_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none !important">
                    <div class="modal-dialog modal-lg">
                        <form action="{{url('update_order')}}" method="POST" style="padding:10px">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="od_id" id="od_id" value="{{$order->id}}" />
                            <div id="orderdetailprint" class="modal-content">
                                <h2 style="text-align:center;">Đơn Đặt Hàng</h2>

                                <ul class="list-ifod clearfix">
                                    <li>
                                        <input value="{{$order->full_name}}" type="text" name="full_name" id="full_name" required>
                                        </input>
                                    </li>
                                    <li>
                                        <p><b>Địa chỉ nhận: {{$order->street_address}}</b><span id="address"></span></p>
                                    </li>
                                    <!-- <li>
                                            <p><b>Email:</b> <span id="email">ngocdep@gmail.com</span></p>
                                        </li>
                                        <li>
                                            <p><b>Số điện thoại:</b><span id="mobile">0373066558.</span></p>
                                        </li> -->

                                    <li>
                                        <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                                    </li>
                                    <!-- <li>
                                        <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                                    </li> -->
                                    <li>

                                        <!-- <input type="text" name="status" id="status" required>

                                        </input> -->
                                        <select id="status" name="status" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                                            <option value=""> Trạng thái </option>
                                            @foreach ($status as $value)
                                            {{$value->id}}
                                            <option value="{{ $value->id }}">
                                                {{ $value->status_name }}
                                            </option>

                                            @endforeach
                                        </select>
                                    </li>
                                    <!-- <li>
                                            <p><b>Ghi chú:</b> <span id="note"></span></p>
                                        </li> -->
                                </ul>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3 pb-4">
                                    <button type="submit" class="btn btn-primary test-form">Sửa</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach

            <!-- End Model Here -->
            <div class="pagination">
                <div class="left">
                    <a href="#" class="back0"></a>
                    <a href="#" class="back1"></a>
                    <div style="margin-top: 2px;">
                        <span>Page</span>
                        <input type="text" name="page" value="1">
                        <input type="hidden" value="1">
                        <span>/2</span>
                    </div>
                    <a href="#" class="next1"></a>
                    <a href="#" class="next0"></a>
                </div>
                <div class="right">
                    <span>Amount results per page:</span>
                    <select name="RowPerPage">
                        <option value="5" selected="">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                    <span>/ Totally: 6</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection