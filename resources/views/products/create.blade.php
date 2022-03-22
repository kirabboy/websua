@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
    <div class="row" style="padding:10px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('products.index')}}" title="Go back"> Back <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data"style="padding:10px" >
        @csrf

        <div class="row" >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên sản phẩm:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Thương hiệu:</strong>
                    <input type="text" name="brand" class="form-control" placeholder="Nhập thương hiệu">
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ảnh sản phẩm:</strong>
                    <input type="file" name="file_upload" onchange="readURL(this);" class="form-control" placeholder="Chọn ảnh sản phẩm">
                    <img id="blah" src="{{asset('/public/image/no-image-800x600.png')}}" alt="your image" style="width:200px;height:200px" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá sản phẩm:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm:">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
             
                    <strong>Mô tả :</strong>
                    <textarea type="text" name="description" class="form-control"  id="ckeditor_des"   placeholder="Nhập mô tả:"></textarea>
               
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
             
             <strong>Mô tả ngắn :</strong>
             <textarea type="text" name="short_description" class="form-control" id="ckeditor_short_des" placeholder="Nhập mô tả ngắn:"></textarea>
        
     </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
            </div>
        </div>

    </form>
@endsection