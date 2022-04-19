@extends('layouts.master')
@section('title', 'Doanh số bán hàng')
@section('content')

<style>
    td, th {
        text-align: center;
    }
</style>
<table id="doanh-so-ban-hang" class="display" style="width:100%">
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
            @foreach($listOrders as $value)
            <tr>
                <td>{{$value->created_at->format('Y-m-d')}}</td>
                <td>{{$value->full_name}}</td>
                <td>{{number_format($value->test)}}</td>
                <td>{{DB::table('trungtampp')->
                    where('id',$value->trungtam_pp)->first()->tentrungtam}}</td>
                <td>{{ DB::table('status_product') ->where('id',$value->status)->first()->status_name}}</td>
                <td>
                    {{$value->street_address}}, 
                    {{ DB::table('ward')->where('maphuongxa',$value->sel_ward)->first()->tenphuongxa}}, 
                    {{ DB::table('district')->where('maquanhuyen',$value->sel_district)->first()->tenquanhuyen}}, 
                    {{ DB::table('province') ->where('matinhthanh',$value->sel_province)->first()->tentinhthanh}}
                </td>
                <td>
                    <a class="" href="#" data-toggle="modal" data-target="#create_sales_{{$value->id}}" id="btn_add">
                        <i class="fas fa-eye"></i>
                    </a>
                    @if( $value->status ==1)
                    <button class="editbtn" href="#" value="{{$value->id}}" data-toggle="modal" data-target="#create_{{$value->id}}" id="btn_add">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    @else
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<script>
    $(document).ready(function() {
        $('#doanh-so-ban-hang').DataTable();
    } );
</script>

@endsection

<!-- Model here -->

@foreach ( $listOrders as $order)
<div class="modal fade" id="create_sales_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none !important">
        <div class="modal-dialog modal-lg">
            <div id="orderdetailprint" class="modal-content">
                <h2 style="text-align:center;">Đơn Đặt Hàng</h2>
                <ul class="list-ifod clearfix">
                    <li>
                        <p><b>Họ và tên: {{$order->full_name}}</b>
                        <span id="fullName"></span></p>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Model fix trang thai -->
@foreach ( $listOrders as $order)
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
                        </li>
                        <li>
                            <p><b>Địa chỉ nhận:</b> {{$order->street_address}}<span id="address"></span></p>
                        </li>

                        <li>
                            <p><b>Ngày tạo:</b> <span id="date">{{$order->created_at}}</span></p>
                        </li>
                        <li>
                            <select id="status" name="status" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                                @foreach ($status as $value)
                                    {{$value->id}}
                                    <option value="{{ $value->id }}">
                                        {{ $value->status_name }}
                                    </option>
                                @endforeach
                            </select>
                        </li>
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