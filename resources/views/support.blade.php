@extends('layouts.master')

@section('title', 'Trợ giúp')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/support.css') }}">
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
@endpush

@section('content')
    <div class="row support-page">
        <!-- Nav pills -->
        <ul class="nav nav-pills col-lg-3 col-sm-12 list-group" role="tablist">
            <li class="nav-item list-group-item">
                <a class="nav-link active" data-toggle="pill" href="#thuden"><i class="fas fa-inbox"></i> Hộp thư đến</a>
            </li>
            <li class="nav-item list-group-item">
                <a class="nav-link" data-toggle="pill" href="#soanthu"><i class="fas fa-edit"></i> Soạn thư</a>
            </li>
            <li class="nav-item list-group-item">
                <a class="nav-link" data-toggle="pill" href="#thugui"><i class="fas fa-envelope"></i> Hộp thư đã gửi</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content col-lg-9 col-sm-12">
            <div id="thuden" class="tab-pane active">
                <div class="support-content widget">
                    <div class="widget-head">
                        <h4 class="heading">Hộp thư đến</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Người gửi</th>
                                    <th>Chủ đề</th>
                                    <th>Ngày gửi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="soanthu" class="tab-pane fade">
                <div class="support-content widget">
                    <div class="widget-head">
                        <h4 class="heading">Soạn thư</h4>
                    </div>
                    <div class="widget-body">
                        <form>
                            <div class="form-content">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Đến</label>
                                    <div class="col-sm-10">
                                        <select id="inputState" class="form-control">
                                            <option selected>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Chủ đề</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Chủ đề">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nội dung</label>
                                    <div class="col-sm-10">
                                        <textarea name="editor1" class="form-control"></textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>   
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="text-right">
                            <a href="{{asset('/support')}}" class="btn">Hủy</a>
                            <button type="button" class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="thugui" class="tab-pane fade">
                <div class="support-content widget">
                    <div class="widget-head">
                        <h4 class="heading">Hộp thư đã gửi</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Người gửi</th>
                                    <th>Chủ đề</th>
                                    <th>Ngày gửi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection