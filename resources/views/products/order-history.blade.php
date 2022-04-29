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
            <table class="table table-bordered table-striped table-hover bangthuong text-center ">

            @if($orders!= null)
                <thead>
                    <tr>
                        <th>Thời gian mua hàng</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Tỉnh</th>
                        <th>Huyện</th>
                        <th>Xã</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $orders as $order)
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->test}}
                        </td>
                        <td>
                            <a href="" class="update_record" data-name="firstname" data-type="text" data-pk="{{ $order->status }}" data-title="Enter Firstname"> 
                                {{ DB::table('status_product')->where('id',$order->status)
                                    ->first()->status_name}}</a>
                        </td>
                        <td>
                            {{ DB::table('province') ->where('matinhthanh',
                                $order->sel_province)->first()->tentinhthanh}}
                        </td>
                        <td>
                            {{ DB::table('district')->where('maquanhuyen',
                                $order->sel_district)->first()->tenquanhuyen}}
                        </td>
                        <td>
                            {{ DB::table('ward')->where('maphuongxa',
                                $order->sel_ward)->first()->tenphuongxa}}
                        </td>
                        <td>
                            <a class=" " href="#" data-toggle="modal" data-target="#create_sales_{{$order->id}}" id="btn_add">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>

            @else
            <style>
                thead {
                    display: none;
                }
                </style>
                <h3 class="text-danger text-center">Hiện tại bạn chưa có đơn đặt hàng nào!</h3>
                
                <div class="text-center">
                    <a class="btn btn-danger text-white" href="{{url('dat-hang')}}">Đặt hàng ngay !</a>
                </div>
            @endif
            <!-- Model here -->
            @foreach ( $orders as $order)
            <div class="modal fade" id="create_sales_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none !important">
                    <div class="modal-dialog modal-lg">
                        <div id="orderdetailprint" class="modal-content">
                            <h2 style="text-align:center;">Đơn Đặt Hàng</h2>

                            <ul class="list-ifod clearfix">
                                <li>
                                    <p>
                                        <b>Họ và tên: {{$order->full_name}}</b>
                                        <span id="fullName"></span>
                                    </p>
                                </li>
                                <li>
                                    <p><b>Địa chỉ nhận: {{$order->street_address}}</b>
                                    <span id="address"></span></p>
                                </li>
                                <li>
                                    <p><b>Ngày tạo:</b> 
                                    <span id="date">{{$order->created_at}}</span></p>
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
                                                    <img src=" {{url('/public/image')}}/{{ DB::table('products') ->where('id', $value->id_product)->first()->image  ?? 'Sản phẩm đã bị xóa'}}"  style="width:30px">
                                                </a>
                                            </div>
                                            <div class="desc">
                                                <h3 class="name">
                                                    <a href="/thuc-duong-giam-can-800gr" title="Thực Dưỡng Giảm Cân 800gr">
                                                        {{ DB::table('products') ->where('id', $value->id_product)->first()->name  ?? 'Sản phẩm đã bị xóa'}}
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
                                </tbody>
                            </table>
                        </div>
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