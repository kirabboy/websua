<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hoa hồng được hưởng</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/transactions.css') }}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
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
                    <tr>
                        <th>Thưởng</th>
                        <th>Số tiền</th>
                        <th>Nhận từ ID</th>
                        <th>Ngày</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hoa hồng chênh lệch cấp đại lý</td>
                        <td>95,200 ₫</td>
                        <td>nhathuy</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoa hồng chênh lệch cấp đại lý</td>
                        <td>200,000 ₫</td>
                        <td>nhathuy</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoa hồng chênh lệch cấp đại lý</td>
                        <td>95,200 ₫</td>
                        <td>nhathuy</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoa hồng đồng danh hiệu tầng 1: 0.5%</td>
                        <td>19,520 ₫</td>
                        <td>nhathuy</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Thưởng trực tiếp 3% từ nhathuy</td>
                        <td>117,120 ₫</td>
                        <td>nhathuy</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoa hồng doanh số cá nhân 10%</td>
                        <td>192,000 ₫</td>
                        <td>ngocdiep1</td>
                        <td>27/04/2021 22:04</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Hoa hồng doanh số cá nhân 5%</td>
                        <td>1,900,000 ₫</td>
                        <td>ngocdiep1</td>
                        <td>27/04/2021 22:04</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-danger">Tổng: </td>
                        <td colspan="4" class="text-danger">
                            <span>Hoa hồng: 2,523,840 ₫</span>
                            <span>Đã nhận: 2,523,840 ₫</span>
                            <span>Chưa nhận: 0 ₫</span>
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

    <!-- bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>