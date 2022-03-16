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
                    <tr>
                        <td>27/04/2021 22:04</td>
                        <td>41,920,000 ₫</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelThemImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="">
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
                <input class="form-control" placeholder="Nhập tiêu đề ảnh">

                <label class="pt-2">Upload ảnh</label>
                <input class="form-control" type="file" id="img" name="img" accept="image/*">
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