@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<section class="edit_product p-4">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('products.index')}}" title="Go back">Trở về <i class="fas fa-backward "></i> </a>
        </div>
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

<form action="{{ route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data" style="padding:10px" >
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-6 col-sm-6  col-md-6">
            <div class="form-group">
                <strong>Tên sản phẩm:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
       
        <div class="col-xs-6 col-sm-6  col-md-6">
            <div class="form-group">
                <strong>Ảnh sản phẩm:</strong>
                <input type="file" name="file_upload" onchange="readURL(this);"  class="form-control" placeholder="image">
                <img id="blah" src="{{url('/public/image')}}/{{$product->image}}" width="100px">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6  col-md-6">
            <div class="form-group">
                <strong>Giá</strong>
                <input type="number" name="price" class="form-control" placeholder="" value="{{$product->price}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6  col-md-6">
                <div class="form-group">
                    <strong>Trọng lượng:</strong>
                    <input type="number" name="weight" class="form-control" placeholder="" value="{{$product->weight}}">
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <strong>Mô tả :</strong>
            <textarea type="text" name="description" class="form-control"  id="ckeditor_des" placeholder="Nhập mô tả:">{{$product->description}}</textarea>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <strong>Mô tả ngắn :</strong>
            <textarea type="text" name="short_description"class="form-control" id="ckeditor_short_des" placeholder="Nhập mô tả ngắn:">{{$product->short_description}}</textarea>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </div>

</form>
</section>
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script type="text/javascript">
        CKEDITOR.replace('ckeditor_des');
        CKEDITOR.replace('ckeditor_short_des');
    </script>
@endpush