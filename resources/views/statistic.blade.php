<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lịch sử mua hàng hệ thống</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/statistic.css') }}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="statistic-content widget">
        <div class="widget-head">
            <h4 class="heading">Lịch sử mua hàng hệ thống</h4>
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
                        <th>Tên đăng nhập</th>
                        <th>Số tiền</th>
                        <th>Trung tâm</th>
                        <th>Ngày</th>
                        <th>Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-uppercase">nhathuy</td>
                        <td>3,904,000 ₫</td>
                        <td>Trung Tâm Phân Phối Sài Gòn 01</td>
                        <td>30/04/2021 06:38</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-uppercase text-danger">tổng</td>
                        <td colspan="4" class="text-danger">3,904,000 ₫</td>
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