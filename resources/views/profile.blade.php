<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
</head>

<body>
    <div class="profile-content widget">
        <div class="widget-head">
            <h4 class="heading">Thông tin cá nhân</h4>
        </div>
        <div class="widget-body">
            <form>
                <div class="form-content">
                    <div class="form-group text-center">
                        <img src="{{ asset('/img/user_male2.png') }}" id="anhdaidien" alt="doan thi ngoc diep" height="100" width="100">
                        <label class="btn-sm btn-danger btn-avt">
                            Sửa Ảnh <input type="file" id="daidien" style="display: none">
                        </label>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-4">
                            <h3 class="heading">ngocdiep1</h3>
                        </div>
                        <label class="col-sm-2 col-form-label">Cấp bậc</label>
                        <div class="col-sm-4">
                            <h3 class="heading">Đại lý bán buôn</h3>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="Doan Thi Ngoc Diep">
                        </div>
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" value="ngocdiep@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="Ap 6 Thanh Duc Ben Luc Long An">
                        </div>
                        <label class="col-sm-2 col-form-label">Ngày sinh</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="01/01/1977">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Điện thoại</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="0373066558">
                        </div>
                        <label class="col-sm-2 col-form-label">Người kế thừa</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên ngân hàng</label>
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option selected>--- Chọn ngân hàng ---</option>
                                <option>ACB</option>
                                <option>Vietcombank</option>
                                <option>Sacombank</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label">Tài khoản NH</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="070084057183">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chủ thẻ</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="DOAN THI NGOC DIEP">
                        </div>
                        <label class="col-sm-2 col-form-label">Chi nhánh</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="Long An">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">CMT</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="300872666">
                        </div>
                        <label class="col-sm-2 col-form-label">Ngày cấp</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="16/10/2018">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nơi cấp</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="C.A. Long An">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">CMT mặt trước</label>
                        <div class="col-sm-4">
                            <img class="anhcmt" src="{{ asset('/img/img_nogr.jpg') }}" id="anhcmttruoc" alt="doan thi ngoc diep">
                            <br/>
                            <label class="btn-sm btn-danger">
                                Sửa Ảnh <input type="file" id="cmttruoc" style="display: none">
                            </label>
                        </div>
                        <label class="col-sm-2 col-form-label">CMT mặt sau</label>
                        <div class="col-sm-4">
                            <img class="anhcmt" src="{{ asset('/img/img_nogr.jpg') }}" id="anhcmtsau" alt="doan thi ngoc diep">
                            <br/>
                            <label class="btn-sm btn-danger">
                                Sửa Ảnh <input type="file" id="cmtsau" style="display: none">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" id="btn_dk" class="btn btn-primary btn">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    <p></p>
    <div class="profile-content widget">
        <div class="widget-head">
            <h4 class="heading">Thay đổi mật khẩu</h4>
        </div>
        <div class="widget-body">
            <form>
                <div class="form-content">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mật khẩu cũ</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <button type="button" id="btn_dk" class="btn btn-primary btn">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

    <!-- bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/profile.js') }}"></script>
</body>

</html>