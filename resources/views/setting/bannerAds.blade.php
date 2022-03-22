@extends('layouts.master')

@section('title', 'Cài đặt ảnh banner')

@section('content')

<div class="container-fluid">
    <div class="transactions-content widget">
        <div class="widget-head">
            <h4 class="heading">Danh sách banner</h4>
        </div>
        <div class="widget-body">
            <div class="pb-3 text-center">
                <a class="btn btn-dark" href="" data-toggle="modal" data-target="#modelThemImage">
                    <i class="fas fa-plus"></i> Thêm mới</a>
            </div>

            <table class="table table-bordered table-striped table-hover bangthuong text-center ">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $value)
                    <tr>
                        <td>{{$value->title}}</td>
                        <td><img src="{{asset('public/banner')}}/{{$value->image}}" style="border-radius: 0; max-width: 400px; max-height: 150px"></td>
                        <td>
                            <a href="{{asset('setting-banner/delete')}}/{{$value->id}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelThemImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('setBannerAds')}}" method="POST" enctype="multipart/form-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Tiêu đề</label>
                <input class="form-control" name="title" placeholder="Nhập tiêu đề ảnh">

                <label class="pt-2">Upload ảnh</label>
                <input class="form-control" type="file" id="img" name="image" accept="image/*">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    @csrf
    </form>
</div>
@endsection