<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('public/css/boostrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/css/register.css') }}">
</head>

<body id="signUp">
    <div class="register-content widget mt-3">
        <div class="widget-head">
            <a href="javascript:history.back()">
                <i class="fa-solid fa-circle-arrow-left"></i>Trở về</a>
            <h4 class="heading text-center">Đăng ký</h4>
        </div>
        <div class="widget-body">
            @if (session('mess'))
            <div class="alert alert-success">
                {{ session('mess') }}
                <a href="{{url('/dang-nhap')}}">Đi tới trang đăng nhập!</a>
            </div>
            @endif
            <form method="post" action="{{url('/dang-ki')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-content">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tên đăng nhập <span class="ast"></span></label>
                            <input id="username" name="username" onkeyup="HienThi('username')" class="form-control @error('username') border-danger @enderror" value="{{ old('username') }}">
                            @error('username')
                            <div class="text-danger username">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Người dùng giới thiệu</label>
                            <input type="checkbox" id="btn-gioithieu" name="btn_gioithieu">
                            <input class="form-control" id="gioithieu" name="gioithieu" disabled="" value="">
                            @error('gioithieu')
                            <div class="text-danger gioithieu">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mật khẩu <span class="ast"></span></label>
                            <input type="password" id="password" name="password" onkeyup="HienThi('password')" class="form-control @error('password') border-danger @enderror">
                            @error('password')
                            <div class="text-danger password">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nhập lại mật khẩu <span class="ast"></span></label>
                            <input type="password" id="re_password" name="re_password" onkeyup="HienThi('re_password')" class="form-control @error('re_password') border-danger @enderror">
                            @error('re_password')
                            <div class="text-danger re_password">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Họ và tên <span class="ast"></span></label>
                            <input type="text" id="name" name="name" onkeyup="HienThi('name')" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger name">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Điện thoại <span class="ast"></span></label>
                            <input type="text" id="phone" name="phone" onkeyup="HienThi('phone')" class="form-control @error('phone') border-danger @enderror" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="text-danger phone">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0"><label>Địa chỉ <span class="ast"></span></label></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="sel_province" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                                <option value=""> Cấp tỉnh </option>
                                @foreach ($province as $value)
                                <option value="{{ $value->matinhthanh }}">{{ $value->tentinhthanh }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-control select2" name="sel_district" data-placeholder=" Cấp huyện " required>
                                <option value=""> Cấp huyện </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-control select2" name="sel_ward" data-placeholder=" Cấp xã " required>
                                <option value=""> Cấp xã </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Số nhà <span class="ast"></span></label>
                            <input type="text" id="address" name="address" onkeyup="HienThi('address')" class="form-control @error('address') border-danger @enderror" value="{{ old('address') }}">
                            @error('address')
                            <div class="text-danger address">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email <span class="ast"></span></label>
                            <input type="email" id="email" name="email" onkeyup="HienThi('email')" class="form-control @error('email') border-danger @enderror" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger email">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Tên ngân hàng</label>
                            <select class="form-control" name="nganhang" required>
                                <option value=""> -- Chọn ngân hàng -- </option>
                                @foreach (DB::table('nganhang')->get() as $value)
                                <option value="{{ $value->id }}">{{ $value->tennganhang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tài khoản ngân hàng</label>
                            <input id="taikhoannh" type="text" onkeyup="HienThi('taikhoannh')" class="form-control @error('taikhoannh') border-danger @enderror" name="taikhoannh" value="{{ old('taikhoannh') }}">
                            @error('taikhoannh')
                            <div class="text-danger taikhoannh">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Chủ thẻ</label>
                            <input id="chuthe" type="text" onkeyup="HienThi('chuthe')" class="form-control text-uppercase @error('chuthe') border-danger @enderror" name="chuthe" value="{{ old('chuthe') }}">
                            @error('chuthe')
                            <div class="text-danger chuthe">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Chi nhánh</label>
                            <input id="chinhanh" type="text" onkeyup="HienThi('chinhanh')" class="form-control @error('chinhanh') border-danger @enderror" name="chinhanh" value="{{ old('chinhanh') }}">
                            @error('chinhanh')
                            <div class="text-danger chinhanh">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- ĐIỀU KHOẢN CỘNG TÁC VIÊN -->
                <div class="form-content2">
                    <div class="ms-panel-head">
                        <h6>Điều khoản cộng tác viên</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="form-group">
                            <div class="rule-content">
                                <ul class="rule">
                                    <li>
                                        ĐIỀU 1. QUYỀN VÀ TRÁCH NHIỆM CỦA CỘNG TÁC VIÊN
                                        <ul>
                                            <li>
                                                1.1. Quyền của Cộng tác viên:
                                                <ul>
                                                    <li>
                                                        - Được hưởng tiền thù lao cộng tác viên theo quy định.
                                                    </li>
                                                    <li>
                                                        - Được cung cấp tài khoản, mật khẩu tài khoản trên hệ thống bán hàng; chủ động tổ chức thực hiện các công việc cần thiết để tiếp xúc, trao đổi, đàm phán tư vấn, giới thiệu sản phẩm của LuckymilkVN với khách hàng.
                                                    </li>
                                                    <li>
                                                        - Được tra cứu số liệu đối soát hàng tháng của mình trên hệ thống.
                                                    </li>
                                                    <li>
                                                        - Được quyền chủ động về thời gian, địa điểm và cách thức thực hiện công việc phù hợp với quy định của pháp luật.
                                                    </li>
                                                    <li>
                                                        - Được yêu cầu LuckymilkVN hướng dẫn, đào tạo các kỹ năng, nghiệp vụ cần thiết, cung cấp các thông tin, tài liệu, văn bản, các chương trình khuyến mại, thay đổi giá và các quy trình, nghiệp vụ,... liên quan đến các sản phẩm mà Cộng tác viên làm cộng tác viên để cung cấp cho khách hàng.
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                1.2. Trách nhiệm của Cộng tác viên:
                                                <ul>
                                                    <li>
                                                        - Tự chịu trách nhiệm về pháp lý trong mọi hoạt động của mình.
                                                    </li>
                                                    <li>
                                                        - Cam kết cung cấp chính xác các thông tin của mình cho LuckymilkVN để phục vụ cho việc kiểm tra, đối chiếu và thanh toán.
                                                    </li>
                                                    <li>
                                                        - Thực hiện việc tìm kiếm khách hàng, tư vấn, chăm sóc, giới thiệu sản phẩm, dịch vụ và các hoạt động khác trung thực, rõ ràng, minh bạch và theo đúng các quy định của LuckymilkVN. Hướng dẫn khách hàng mua các sản phẩm của LuckymilkVN.
                                                    </li>
                                                    <li>
                                                        - Bảo mật bí mật kinh doanh của LuckymilkVN; cam kết sử dụng tài khoản, các vật dụng, tài liệu và các tài sản khác do LuckymilkVN cung cấp (nếu có) theo đúng các mục đích và yêu cầu của LuckymilkVN trong việc chăm sóc khách hàng, quảng bá, giới thiệu sản phẩm, dịch vụ và hình ảnh của LuckymilkVN.
                                                    </li>
                                                    <li>
                                                        - Không tiến hành quảng bá, kinh doanh, phân phối sản phẩm, dịch vụ bằng hình thức quấy rối, gian lận,...; Không quảng bá sản phẩm, dịch vụ trên các kênh vi phạm pháp luật, trái với thuần phong mỹ tục, kênh bị tranh chấp và/hoặc các hình thức không được pháp luật cho phép hoặc chưa quy định rõ ràng,…
                                                    </li>
                                                    <li>
                                                        - Đảm bảo thái độ làm việc tích cực, đúng quy định, giao tiếp lịch sự, không làm tổn hại đến uy tín, hình ảnh và sản phẩm, dịch vụ của LuckymilkVN.
                                                    </li>
                                                    <li>
                                                        - Tổng hợp, thông báo và cung cấp cho LuckymilkVN các yêu cầu, ý kiến, góp ý của khách hàng về sản phẩm, dịch vụ của LuckymilkVN (nếu có).
                                                    </li>
                                                    <li>
                                                        - Không tiết lộ cho bất kỳ bên thứ ba nào khác các thông tin về bí mật kinh doanh, thông tin về dịch vụ của LuckymilkVN, thông tin về khách hàng sử dụng dịch vụ của LuckymilkVN và các thông tin liên quan khi chưa nhận được sự đồng ý của LuckymilkVN.
                                                    </li>
                                                    <li>
                                                        - Không được chuyển giao một phần hoặc toàn bộ quyền, nghĩa vụ của mình cho người khác dưới bất kỳ hình thức nào nếu không được sự chấp thuận của LuckymilkVN.
                                                    </li>
                                                    <li>
                                                        - Thực hiện các nghĩa vụ về thuế, phí và các chi phí khác liên quan (nếu có) đến quá trình thực hiện thỏa thuận này.
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        ĐIỀU 2. ĐIỀU KHOẢN THỰC HIỆN
                                        <ul>
                                            <li>
                                                <ul>
                                                    <li>
                                                        Cộng tác viên cam kết tuân thủ đầy đủ các điều khoản và điều kiện đã thỏa thuận này với tinh thần thiện chí, trung thực trong quá trình thực hiện.
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbtn_dk">
                                <label class="custom-control-label" for="checkbtn_dk" style="font-weight: 500;">Tôi đã Đọc và đồng ý với các
                                    <a href="#" data-toggle="modal" style="color: #007bff;" data-target="#ruleId">Quy định và Điều khoản</a> của LuckymilkVN, cam kết thực hiện đầy đủ các nội dung nêu trên.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" id="btn_dk" class="btn btn-primary btn" disabled="">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/js/shipping.js') }}"></script>
    <script src="{{ asset('public/js/register.js') }}"></script>
</body>

</html>