@extends('layouts.master')

@section('title', 'Đăng ký')

@push('css')
<link rel="stylesheet" href="{{ asset('/public/css/register.css') }}">
@endpush

@section('content')
<div class="register-content widget">
    <div class="widget-head">
        <h4 class="heading">Đăng ký</h4>
    </div>
    <div class="widget-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            @if ($errors->count() == 1)
                @foreach ($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
            @else
                <div>Điền đầy đủ và đúng thông tin vào các ô có đánh dấu (<span class="ast">*</span>)</div>
            @endif
        </div>
        @endif
        @if (session('mess'))
        <div class="alert alert-success">
            {{ session('mess') }}
        </div>
        @endif
        <form method="post" action="dang-ky" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tên đăng nhập <span class="ast">*</span></label>
                        <input class="form-control" name="username">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Người giới thiệu</label>
                        <input class="form-control" disabled value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mật khẩu <span class="ast">*</span></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nhập lại mật khẩu <span class="ast">*</span></label>
                        <input type="password" name="re_password" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Họ và tên <span class="ast">*</span></label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Điện thoại <span class="ast">*</span></label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <!-- Địa chỉ -->
                <div class="form-row">
                    <div class="form-group col-md-12 mb-0"><label>Địa chỉ <span class="ast">*</span></label></div>
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
                        <label>Số nhà <span class="ast">*</span></label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email <span class="ast">*</span></label>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <!-- thông tin cmnd -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Số CMND/CCCD</label>
                        <input type="text" name="cmnd" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ngày cấp</label>
                        <input type="date" class="form-control" name="ngaycmnd" value="2020-01-01">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Nơi cấp</label>
                        <input type="text" name="noicmnd" class="form-control">
                    </div>
                </div>
                <!-- ảnh cmnd -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Ảnh CMT mặt trước</label>
                        <div class="cmt">
                            <input id="cmttruoc" type="file" name="cmttruoc" class="form-control">
                            <img id="anhcmttruoc" src="{{ asset('/img/img_nogr.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ảnh CMT mặt sau</label>
                        <div class="cmt">
                            <input id="cmtsau" type="file" name="cmtsau" class="form-control">
                            <img id="anhcmtsau" src="{{ asset('/img/img_nogr.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- thông tin ngân hàng -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Tên ngân hàng</label>
                        <input type="text" class="form-control text-capitalize" name="nganhang" placeholder="Vd: Sacombank">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tài khoản ngân hàng</label>
                        <input type="text" class="form-control" name="taikhoannh">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Chủ thẻ</label>
                        <input type="text" class="form-control text-uppercase" name="chuthe">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Chi nhánh</label>
                        <input type="text" class="form-control" name="chinhanh">
                    </div>
                </div>
                <!-- ảnh đại diện -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Ảnh đại diện</label>
                        <div class="cmt">
                            <input id="daidien" type="file" name="daidien" class="form-control">
                            <img id="anhdaidien" src="{{ asset('/img/img_nogr.jpg') }}" alt="">
                        </div>
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
                                                    - Được cung cấp tài khoản, mật khẩu tài khoản trên hệ thống bán hàng; chủ động tổ chức thực hiện các công việc cần thiết để tiếp xúc, trao đổi, đàm phán tư vấn, giới thiệu sản phẩm của Forviet với khách hàng.
                                                </li>
                                                <li>
                                                    - Được tra cứu số liệu đối soát hàng tháng của mình trên hệ thống.
                                                </li>
                                                <li>
                                                    - Được quyền chủ động về thời gian, địa điểm và cách thức thực hiện công việc phù hợp với quy định của pháp luật.
                                                </li>
                                                <li>
                                                    - Được yêu cầu Forviet hướng dẫn, đào tạo các kỹ năng, nghiệp vụ cần thiết, cung cấp các thông tin, tài liệu, văn bản, các chương trình khuyến mại, thay đổi giá và các quy trình, nghiệp vụ,... liên quan đến các sản phẩm mà Cộng tác viên làm cộng tác viên để cung cấp cho khách hàng.
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
                                                    - Cam kết cung cấp chính xác các thông tin của mình cho Forviet để phục vụ cho việc kiểm tra, đối chiếu và thanh toán.
                                                </li>
                                                <li>
                                                    - Thực hiện việc tìm kiếm khách hàng, tư vấn, chăm sóc, giới thiệu sản phẩm, dịch vụ và các hoạt động khác trung thực, rõ ràng, minh bạch và theo đúng các quy định của Forviet. Hướng dẫn khách hàng mua các sản phẩm của Forviet.
                                                </li>
                                                <li>
                                                    - Bảo mật bí mật kinh doanh của Forviet; cam kết sử dụng tài khoản, các vật dụng, tài liệu và các tài sản khác do Forviet cung cấp (nếu có) theo đúng các mục đích và yêu cầu của Forviet trong việc chăm sóc khách hàng, quảng bá, giới thiệu sản phẩm, dịch vụ và hình ảnh của Forviet.
                                                </li>
                                                <li>
                                                    - Không tiến hành quảng bá, kinh doanh, phân phối sản phẩm, dịch vụ bằng hình thức quấy rối, gian lận,...; Không quảng bá sản phẩm, dịch vụ trên các kênh vi phạm pháp luật, trái với thuần phong mỹ tục, kênh bị tranh chấp và/hoặc các hình thức không được pháp luật cho phép hoặc chưa quy định rõ ràng,…
                                                </li>
                                                <li>
                                                    - Đảm bảo thái độ làm việc tích cực, đúng quy định, giao tiếp lịch sự, không làm tổn hại đến uy tín, hình ảnh và sản phẩm, dịch vụ của Forviet.
                                                </li>
                                                <li>
                                                    - Tổng hợp, thông báo và cung cấp cho Forviet các yêu cầu, ý kiến, góp ý của khách hàng về sản phẩm, dịch vụ của Forviet (nếu có).
                                                </li>
                                                <li>
                                                    - Không tiết lộ cho bất kỳ bên thứ ba nào khác các thông tin về bí mật kinh doanh, thông tin về dịch vụ của Forviet, thông tin về khách hàng sử dụng dịch vụ của Forviet và các thông tin liên quan khi chưa nhận được sự đồng ý của Forviet.
                                                </li>
                                                <li>
                                                    - Không được chuyển giao một phần hoặc toàn bộ quyền, nghĩa vụ của mình cho người khác dưới bất kỳ hình thức nào nếu không được sự chấp thuận của Forviet.
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
                                <a href="#" data-toggle="modal" style="color: #007bff;" data-target="#ruleId">Quy định và Điều khoản</a> của Forviet, cam kết thực hiện đầy đủ các nội dung nêu trên.</label>
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
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('/public/js/shipping.js') }}"></script>
<script src="{{ asset('/public/js/register.js') }}"></script>
@endpush