<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/login.css') }}">
</head>

<body>
    <div class="row login-content">
        <div class="col-lg-6 d-none d-lg-block left"></div>
        <div class="col-lg-6 right">
            <div class="login-form">
                <div class="text-center">
                    <img src="{{ asset('public/img/logo.png') }}" height="135px">
                </div>
                <form method="post" action="dang-nhap">
                    @csrf
                    <div class="form-box">
                        @if ($errors->any() or session('mess'))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $e)
                            <div>{{ $e }}</div>
                            @endforeach
                            {{ session('mess') }}
                        </div>
                        @endif
                        @if (session('matkhau'))
                        <div class="alert alert-success">
                            {{ session('matkhau') }}
                        </div>
                        @endif
                        <h5>Tên đăng nhập</h5>
                        <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control">
                        <h5>Mật khẩu</h5>
                        <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                        <input type="submit" class="form-control" value="Đăng nhập" style="font-size: 14px;">
                        <div class="form-group row">
                            <label class="col-6">
                                <input type="checkbox" checked="" name="remember" />
                                <span>Remember me</span>
                            </label>
                            <a class="col-6" href="{{url('/dang-ki')}}">Đăng ký</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('public/js/login.js') }}"></script>
</body>

</html>