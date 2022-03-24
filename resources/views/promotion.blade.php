
<link href="{{ asset('css/sidebar.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/footer.css')}}" rel="stylesheet" type="text/css">

<script src="{{ asset('js/boostrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/boostrap/bootstrap.min.js')}}"></script>
@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<!-- Begin Page Content -->
<form method="post" action="{{route('promotion')}}">
<div class="container-fluid">
    <div class="row">
        <div class="col-6 pb-2">
            <div class="alert-success p-3" style="border-radius: 5px">
                Số điểm hiện tại: <strong>{{number_format($diem_user->point)}} điểm</strong>
            </div>
        </div>
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
                                             

                                                <p> <span class="label label-success" name="point">{{number_format($point->points)}} điểm</span></p>
                                            </div>
                                            <div class="mg-10">

                                                <a href="{{url('/promotion')}}/{{$point->points}}" class="btn btn-primary btn-sm">Đổi điểm</a>
                    
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
    @csrf
    </form>
    @if ($history != null)
    <table class="kv-grid-table table table-hover table-striped kv-table-wrap" id="gridView">
        <thead>
            <th>Phần thưởng</th>
            <th>Ngày đổi</th>
        </thead>

        <tbody>
            @foreach ($history as $value)
            <tr>
                <td>
                    @if($value->promotion_id == 1)
                        Xe máy
                    @elseif($value->promotion_id == 2)
                        Xe hơi
                    @endif
                </td>
                <td>{{$value->created_at->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <!-- /.container-fluid -->
    @endsection