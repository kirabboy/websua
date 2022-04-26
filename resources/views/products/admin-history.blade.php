@extends('layouts.master')
@section('title', 'SB Admin 2 - Dashboard')
@section('content')

<div class="container-fluid">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="transactions-content widget">
        <div class="widget-head">
            <h4 class="heading">Lịch sử đặt hàng</h4>
        </div>
        <div class="widget-body">
            <table class="table table-bordered table-striped table-hover bangthuong text-center ">
                <thead>
                    <tr>
                        <th style="cursor:pointer">Thời gian đặt</th>
                        <th>Khách hàng</th>
                        <th>Số tiền</th>
                        <th>Nơi phân phối</th>
                        <th>Trạng thái</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $orders as $order)
                    <tr>

                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                        <td>{{$order->full_name}}
                        <td>{{number_format($order->test)}} 
                        </td>
                        <td>{{DB::table('trungtampp')->where('id',$order->trungtam_pp)->first()->tentrungtam}}</td>
                        <td>
                            <a> {{ DB::table('status_product') ->where('id',$order->status)->first()->status_name}}</a>

                        </td>
                        <td>
                            {{$order->street_address}}, 
                            {{ DB::table('ward')->where('maphuongxa',$order->sel_ward)->first()->tenphuongxa}}, 
                            {{ DB::table('district')->where('maquanhuyen',$order->sel_district)->first()->tenquanhuyen}}, 
                            {{ DB::table('province') ->where('matinhthanh',$order->sel_province)->first()->tentinhthanh}}
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
                                    <p><b>Địa chỉ nhận:</b> {{$order->street_address}}<span id="address"></span></p>
                                </li>

                                <li>
                                    <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                                </li>
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
                                                    <img src=" {{url('/public/image')}}/{{ DB::table('products') ->where('id', $value->id_product)->first()->image ?? 'Sản phẩm đã bị xóa'}}" style="width:30px">
                                                </a>
                                            </div>
                                            <div class="desc">
                                                <h3 class="name">
                                                    <a>
                                                        {{ DB::table('products') ->where('id', $value->id_product)->first()->name ?? 'Sản phẩm đã bị xóa'}}
                                                    </a>
                                                </h3>
                                            </div>
                                        </td>

                                        <td class="td-responsive" data-title="Giá:" style="white-space: nowrap">
                                            <div class="wrap price">
                                                {{$value->amount}} ₫
                                            </div>
                                        </td>
                                        <td class="td-responsive" data-title="Số lượng:">

                                            <div class="wrap number wan-spinner wan-spinner-detail-pro">
                                                {{$value->qty}}
                                            </div>
                                        </td>
                                        <td class="td-responsive price" data-title="Thành tiền:" style="white-space: nowrap;">
                                            <div class="wrap">   {{$value->total}} ₫</div>
                                        </td>
                                    </tr>


                                    @endforeach


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
                                        <p><b>Họ tên:</b> <span id="name">{{$order->full_name}}</span></p>
                                        <!-- <input value="{{$order->full_name}}" class="form-control" type="text" name="full_name" id="full_name" required>
                                        </input> -->
                                    </li>
                                    <li>
                                        <p><b>Địa chỉ nhận:</b> {{$order->street_address}}<span id="address"></span></p>
                                    </li>

                                    <li>
                                        <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                                    </li>
                                    <li>

                                        <!-- <input type="text" name="status" id="status" required>

                                        </input> -->
                                        <select id="status" name="status" class="form-control select2" data-placeholder=" Cấp tỉnh " required>

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
                                    <button type="submit" class="btn btn-primary test-form">Hoàn Thành</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/js/product.js') }}"></script>
@endpush