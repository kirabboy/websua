
<link href="{{ asset('css/sidebar.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/footer.css')}}" rel="stylesheet" type="text/css">

<script src="{{ asset('js/boostrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/boostrap/bootstrap.min.js')}}"></script>
@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="box-document">
                <div class="header-document">
                    <h4 class="heading-doccument">Sản phẩm</h4>
                </div>
                <div class="body-document">
                    <form id="frmSearch">
                        <table class="table table-bordered table-striped" id="searchTable">
                            <tbody>
                                <tr>
                                    <td>Từ khóa </td>
                                    <td><input type="text" id="Keyword" class="form-control" name="Keyword" placeholder="Từ khóa"></td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="2">
                                        <a class="btn btn-primary text-light" id="btnFill">Tìm kiếm</a>
                                        <a class="btn btn-primary  text-light" id="btnExport">Xuất file</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </form>
                    <div class="product-items">
                        <div class="row">
                        @foreach ( $product as $products)
                            <div class=" col-12 col-md-6 ">
                                <div class="box-product">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a title="{{$products->name}}" href="{{url('/product-detail')}}">
                                            <img src="{{url('/public/image')}}/{{$products->image}}" ></a>
                                        </div>
                                        <div class="col-lg-6 text-center text-lg-left mt-lg-0 mt-md-4 ">
                                            <h3>
                                                <a title="Phôi Mầm Đậu Nành SOYGERM 60 viên" href="/phoi-mam-dau-nanh-soygerm-60-vien">{{$products->name}} </a>
                                            </h3>


                                            <div class="mg-30">
                                                <p><b>Giá: {{$products->price}} ₫</b></p>
                                               
                                                <b>Mô tả:{{$products->description}}</b>

                                            </div>
                                            <div class="mg-10">

                                                <a class="btn btn-primary btn-sm" href="/cart">Mua ngay</a>
                                                <a class="btn btn-primary btn-sm"><svg class="svg-inline--fa fa-shopping-cart fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                        <path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path>
                                                    </svg><!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> --> Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @endsection