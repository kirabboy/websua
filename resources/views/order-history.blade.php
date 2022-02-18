@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<div class="container-fluid">
    <div class="transactions-content widget">
        <div class="widget-head">
            <h4 class="heading">Lịch sử đặt hàng</h4>
        </div>
        <div class="widget-body">
            <table class="table table-bordered table-striped bangtimkiem">
                <tbody>
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
                    <tr>
                        <th>Thời gian mua hàng</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Trung tâm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>27/04/2021 22:04</td>
                        <td>41,920,000 ₫</td>
                        <td>Đã chuyển</td>
                        <td>Trung Tâm Phân Phối Bình Phước</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-danger">Tổng: </td>
                        <td colspan="1" class="text-danger">
                            <span>41,920,000 ₫</span>
                          
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
</div>
@endsection

