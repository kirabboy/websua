
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
                <div class="body-document">
                    <div class="product-items">
                        <div class="row">
                        @foreach ( $points as $point)
                            <div class=" col-12 col-md-6 ">
                                <div class="box-product">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a title="{{$point->name}}" href="{{url('/product-detail')}}">
                                            <img src="{{$point->image}}" ></a>
                                        </div>
                                        <div class="col-lg-6 text-center text-lg-left mt-lg-0 mt-md-4 ">
                                            <h3>
                                                <a title="Phôi Mầm Đậu Nành SOYGERM 60 viên" href="/phoi-mam-dau-nanh-soygerm-60-vien">{{$point->name}} </a>
                                            </h3>


                                            <div class="mg-30">
                                             

                                                <p> <span class="label label-success">{{$point->points}}</span></p>
                                            </div>
                                            <div class="mg-10">

                                                <a class="btn btn-primary btn-sm" href="/cart">Đổi điểm</a>
                    
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