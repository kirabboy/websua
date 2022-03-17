@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product </h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{route('products.index')}}" title="Go back"> Back <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:
                {{$product->name}}
                </strong>
               

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Image:
                </strong>
                <img src="{{url('/public/image')}}/{{$product->image}}" width="500px">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Price:
                {{$product->price}}
                </strong>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Description:
                {{$product->description}}
                </strong>

            </div>
        </div>
    </div>
@endsection