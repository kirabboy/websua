@extends('layouts.master')

@section('title', 'Lịch sử mua hàng hệ thống')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/statistic.css') }}">
@endpush

@section('content')
<div class="statistic-content widget">
    <div class="widget-head">
        <h4 class="heading">Lịch sử mua hàng hệ thống</h4>
    </div>
    <div class="widget-body">
        <!-- <table class="table table-bordered table-striped bangtimkiem">
            <tbody>
                <tr>
                    <td>Từ Khóa</td>
                    <td><input type="text" class="form-control" placeholder="Từ khóa"></td>
                </tr>
                <tr>
                    <td>Từ thời gian</td>
                    <td><input type="date" class="form-control" value="date"></td>
                </tr>
                <tr>
                    <td>Đến thời gian</td>
                    <td><input type="date" class="form-control"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">
                        <a class="btn btn-primary">Tìm kiếm</a>
                        <a class="btn btn-primary">Xuất file</a>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <table class="table table-bordered table-striped table-hover bangthuong text-center ">
            <thead>
                <tr class="d-none d-md-table-row">
                    <th>Tên đăng nhập</th>
                    <th>Số tiền</th>
                    <th>Trung tâm</th>
                    <th>Ngày</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-uppercase" data-label="Tên đăng nhập">nhathuy</td>
                    <td data-label="Số tiền">3,904,000 ₫</td>
                    <td data-label="Trung tâm">Trung Tâm Phân Phối Sài Gòn 01</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Chi tiết đơn hàng">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="text-uppercase text-danger d-none d-md-table-cell">tổng</td>
                    <td colspan="4" class="text-danger" data-label="Tổng">3,904,000 ₫</td>
                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <div class="left">
                <a href="#" class="back0"></a>
                <a href="#" class="back1"></a>
                <div style="margin-top: 2px;">
                    <span>Page</span>
                    <input type="text" name="page" value="1">
                    <input type="hidden" value="1">
                    <span>/2</span>
                </div>
                <a href="#" class="next1"></a>
                <a href="#" class="next0"></a>
            </div>
            <div class="right">
                <span>Amount results per page:</span>
                <select name="RowPerPage">
                    <option value="5" selected="">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <span>/ Totally: 6</span>
            </div>
        </div>
    </div>
</div>
@endsection