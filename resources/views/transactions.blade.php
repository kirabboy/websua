@extends('layouts.master')

@section('title', 'Hoa hồng được hưởng')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/transactions.css') }}">
@endpush

@section('content')
<div class="transactions-content widget">
    <div class="widget-head">
        <h4 class="heading">Hoa hồng được hưởng</h4>
    </div>
    <div class="widget-body">
        <table class="table table-bordered table-striped bangtimkiem">
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
        </table>
        <table class="table table-bordered table-striped table-hover bangthuong text-center ">
            <thead>
                <tr class="d-none d-md-table-row">
                    <th>Thưởng</th>
                    <th>Số tiền</th>
                    <th>Nhận từ ID</th>
                    <th>Ngày</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Thưởng">Hoa hồng chênh lệch cấp đại lý</td>
                    <td data-label="Số tiền">95,200 ₫</td>
                    <td data-label="Nhận từ ID">nhathuy</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Hoa hồng chênh lệch cấp đại lý</td>
                    <td data-label="Số tiền">200,000 ₫</td>
                    <td data-label="Nhận từ ID">nhathuy</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Hoa hồng chênh lệch cấp đại lý</td>
                    <td data-label="Số tiền">95,200 ₫</td>
                    <td data-label="Nhận từ ID">nhathuy</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Hoa hồng đồng danh hiệu tầng 1: 0.5%</td>
                    <td data-label="Số tiền">19,520 ₫</td>
                    <td data-label="Nhận từ ID">nhathuy</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Thưởng trực tiếp 3% từ nhathuy</td>
                    <td data-label="Số tiền">117,120 ₫</td>
                    <td data-label="Nhận từ ID">nhathuy</td>
                    <td data-label="Ngày">30/04/2021 06:38</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Hoa hồng doanh số cá nhân 10%</td>
                    <td data-label="Số tiền">192,000 ₫</td>
                    <td data-label="Nhận từ ID">ngocdiep1</td>
                    <td data-label="Ngày">27/04/2021 22:04</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td data-label="Thưởng">Hoa hồng doanh số cá nhân 5%</td>
                    <td data-label="Số tiền">1,900,000 ₫</td>
                    <td data-label="Nhận từ ID">ngocdiep1</td>
                    <td data-label="Ngày">27/04/2021 22:04</td>
                    <td data-label="Hành động">
                        <a href="#"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td class="text-danger d-none d-md-table-cell">Tổng: </td>
                    <td colspan="4" class="text-danger d-none d-md-table-cell">
                        <span>Hoa hồng: 2,523,840 ₫</span>
                        <span>Đã nhận: 2,523,840 ₫</span>
                        <span>Chưa nhận: 0 ₫</span>
                    </td>
                    <td data-label="Hoa hồng" class="text-danger d-block d-md-none">
                        2,523,840 ₫
                    </td>
                    <td data-label="Đã nhận" class="text-danger d-block d-md-none">
                        2,523,840 ₫
                    </td>
                    <td data-label="Chưa nhận" class="text-danger d-block d-md-none">
                        0 ₫
                    </td>
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