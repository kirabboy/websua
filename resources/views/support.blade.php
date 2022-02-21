<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trợ giúp</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/support.css') }}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

</head>

<body>
    <div class="row support-page">
        <!-- Nav pills -->
        <ul class="nav nav-pills col-3 list-group" role="tablist">
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
        <div class="tab-content col-9">
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

    <!-- bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>