<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trung tâm phân phối</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/distribution.css') }}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="distribution-content widget">
        <div class="widget-head">
            <h4 class="heading">Trung tâm phân phối</h4>
        </div>
        <div class="widget-body">
            <table class="table table-bordered table-striped bangtimkiem">
                <tbody>
                    <tr>
                        <td>Từ Khóa</td>
                        <td><input type="text" class="form-control" placeholder="Từ khóa"></td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">
                            <a class="btn btn-primary">Tìm kiếm</a>
                            <a class="btn btn-primary">Xuất file</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Nav pills -->
            <ul class="nav nav-pills row" role="tablist">
                <li class="nav-item col-4">
                    <a class="nav-link active" data-toggle="pill" href="#bac">Miền Bắc</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" data-toggle="pill" href="#trung">Miền Trung</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" data-toggle="pill" href="#nam">Miền Nam</a>
                </li>
            </ul>
        </div>
        <div class="widget-footer row">
            <div class="tab-content col-6">
                <!-- miền Bắc -->
                <div id="hanam01" class="tab-pane active">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7468.866502088194!2d105.897681!3d20.61119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135cebfaac49507%3A0xf0978d79f8e36d7e!2zWMOzbSAyLCBMxrB1IFjDoSwgTmjhuq10IFTDom4sIEtpbSBC4bqjbmcsIEjDoCBOYW0sIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1645338139701!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="phutho02" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7417.932949846269!2d105.183908!3d21.62623!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x74134bed43afcc7b!2zQsawdSDEkWnhu4duIGh1eeG7h24gxJBvYW4gSMO5bmc!5e0!3m2!1svi!2sus!4v1645337694101!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="phutho03" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d237610.79719878297!2d105.155751!3d21.481512!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134991a2d117dcb%3A0x79c95962802df532!2zTmluaCBEw6JuLCBUaGFuaCBCYSwgUGjDuiBUaOG7jSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1645339148736!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="hanoi68" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59518.271941576946!2d105.327022!3d21.196449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8098f98512abe42a!2z4bumeSBCYW4gTmjDom4gRMOibiBYw6MgVMOybmcgQuG6oXQ!5e0!3m2!1svi!2sus!4v1645339224331!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <!-- miền Trung -->
                <div id="phuyen01" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7772.2732651034175!2d109.30647100000002!3d13.090526!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316fec1585b5b88d%3A0x54a504a0f3cd62a4!2zNTcgTmfDtCBRdXnhu4FuLCBQaMaw4budbmcgNSwgVHV5IEjDsmEsIFBow7ogWcOqbiwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1645340161427!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="khanhhoa01" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7800.822600561373!2d109.068269!3d12.152377!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf8be7158726eb2b0!2zQ8O0bmcgVHkgSOG6o2kgVsawxqFuZw!5e0!3m2!1svi!2sus!4v1645340230931!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="thanhhoa03" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15013.576015678364!2d105.76394857846861!3d19.82327503661615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136f7e4fc907965%3A0x6413096a221b56b1!2zxJDDtG5nIFRo4buNLCBUaGFuaCBIb8OhLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1645340286637!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="thanhhoa02" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7528.804860953048!2d105.688866!3d19.35172!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x657ce570fe13aa53!2zVGjDtG4gVMOibiBQaMO6Yw!5e0!3m2!1svi!2sus!4v1645340325263!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <!-- miền Nam -->
                <div id="lamdong01" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7812.087071512527!2d108.155076!3d11.761984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3b83a5f1d839472e!2zVHLGsOG7nW5nIFRIUFQgSHXhu7NuaCBUaMO6YyBLaMOhbmc!5e0!3m2!1svi!2sus!4v1645339798088!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="saigon02" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.618883768023!2d106.72273501474945!3d10.840450092278042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527d7c7611b33%3A0x3ca95ea4fa7f868f!2zMjkgxJDGsOG7nW5nIHPhu5EgMTAsIEhp4buHcCBCw6xuaCBDaMOhbmgsIFRo4bunIMSQ4bupYywgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1645339886182!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="binhthuan02" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7834.459421554065!2d108.106064!3d10.946013!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317683180d95aff3%3A0x555a0c51050749df!2zMTQyIFRy4bqnbiBRdWFuZyBEaeG7h3UsIFh1w6JuIEFuLCBUaMOgbmggcGjhu5EgUGhhbiBUaGnhur90LCBCw6xuaCBUaHXhuq1uLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1645339944130!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div id="dongnai01" class="tab-pane fade">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31333.551136047692!2d106.85612381698377!3d10.986461949460256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174ddb1d5943a43%3A0xcf6de1855549f2fe!2zVHLhuqNuZyBEw6BpLCBUaMOgbmggcGjhu5EgQmnDqm4gSMOyYSwgxJDhu5NuZyBOYWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1645340075780!5m2!1svi!2sus" height="500" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content col-6">
                <div id="bac" class="tab-pane active">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#hanam01">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Hà Nam 01</b></p>
                                    <p>Xóm 2, Thủy Lôi, Kim Bản, Hà Nam</p>
                                    <p>0982795365</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#phutho02">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Phú Thọ 02</b></p>
                                    <p>khu hành chính Tân Thành , thị trấn Đoan hùng, huyện Đoan hùng, tỉnh Phú thọ</p>
                                    <p>0979999112</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#phutho03">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01</b></p>
                                    <p>Ninh Dân, Thanh Ba, Phú Thọ</p>
                                    <p>0374269159</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#hanoi68">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Ba Vì - Hà Nội 68</b></p>
                                    <p>Xóm 3, Thôn Tòng Lệnh, Xã Tòng Bạt, Huyện Ba Vì, Hà Nội</p>
                                    <p>0973763471</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="trung" class="tab-pane fade">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#phuyen01">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Phú Yên 01</b></p>
                                    <p>57 Ngô Quyền, Phường 5, Thành Phố Tuy Hòa, Tỉnh Phú Yên</p>
                                    <p>0913933168</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#khanhhoa01">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Khánh Hòa 01</b></p>
                                    <p>Cổng Khu Công Nghiệp, Suối Dầu , Suối Tân, Thị Trấn Cam Lâm, Khánh Hòa</p>
                                    <p>0938324839 - 0858040960</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#thanhhoa03">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Thanh Hóa 03</b></p>
                                    <p>Lô 17-06 khu đô thị mới ven sông hạc phường Đông Thọ TP THANH HÓA</p>
                                    <p>0983851869</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#thanhhoa02">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Thanh Hóa 02</b></p>
                                    <p>Thôn Tân Phúc, Xã Tân Trường, Huyện Tỉnh Gia, Tỉnh Thanh Hóa</p>
                                    <p>0974968889</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="nam" class="tab-pane fade">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#lamdong01">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Lâm Đồng 01</b></p>
                                    <p>Thôn vinh quang ,hoài đức,lâm hà ,lâm đồng</p>
                                    <p>0359808782 - 0888181386</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#saigon02">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Sài Gòn 02</b></p>
                                    <p>29 đường số 10 - Khu phố 4 - phường Hiệp Bình chánh - Q. Thủ đức - Tp. HCM</p>
                                    <p>0949357308</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#binhthuan02">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Bình Thuận 02</b></p>
                                    <p>142 Trần Quang Diệu, KP1, Phường Xuân An, TP. Phan Thiết, Bình Thuận </p>
                                    <p>0914180084</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#dongnai01">
                                <div>
                                    <span>"></span>
                                    <p><b>Trung Tâm Phân Phối Đồng Nai 01</b></p>
                                    <p>Tổ 23, khu phố 4, phường Trảng Dài, Biên Hòa, Đồng Nai</p>
                                    <p>0796579886 - 0383281727</p>
                                </div>
                            </a>
                        </li>
                    </ul>
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