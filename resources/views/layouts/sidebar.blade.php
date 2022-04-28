<nav id="sidebar" class="navbar-nav sidebar-main sidebar-dark accordion">
	<div class="logo-brand">
		<div class="sidebar-logo d-flex flex-column text-center">
			<a href="{{url('/')}}" class="sidebar-brand-icon">
				<img src="{{ asset('public/image/logo.png') }}" alt="" width="80px">
			</a>
			<div class="box-text">
				<h2><a href="{{url('/thong-tin-ca-nhan')}}">{{Auth::user()->name}}</a></h2>
				<span class="label-color">
					@if (Auth::user()->level == 1) Quản trị
					@elseif (Auth::user()->level == 2) Đại lý bán buôn
					@else Cộng tác viên
					@endif
				</span>
			</div>
			</a>
		</div>
	</div>
	<ul class="side-nav">
		<li class="menu-item">
			<a href="{{url('/')}}" class="@if(\Request::is('/') ) active  @endif">
				<span><i class="fa-solid fa-gamepad"></i>Bảng điều khiển</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/thong-tin-ca-nhan')}}" class="@if(\Request::is('thong-tin-ca-nhan') ) active  @endif">
				<span><i class="fa-solid fa-id-card"></i>Thông tin cá nhân</span>
			</a>
		</li>
		@role('admin')
		<li class="menu-item">
			<a href="{{url('/quan-ly-nguoi-dung')}}" class="@if(\Request::is('quan-ly-nguoi-dung*') ) active  @endif">
				<span><i class="fa-solid fa-user"></i>Quản lý Users</span>
			</a>
		</li>
		@endrole
		@role('admin|daily')
		<li class="menu-item">
			<a href="{{url('/trung-tam-phan-phoi')}}" class="@if(\Request::is('trung-tam-phan-phoi')) active  @endif">
				<span><i class="fa-solid fa-landmark"></i>Trung tâm phân phối</span>
			</a>
		</li>
		@endrole
		<li class="menu-item">
			<a href="{{url('/tai-lieu')}}" class="@if(\Request::is('tai-lieu') ) active  @endif">
				<span><i class="fa-solid fa-floppy-disk"></i>Tài liệu</span>
			</a>
		</li>
		@role('admin')
		<li class="menu-item">
			<a href="{{url('/san-pham')}}" class="@if(\Request::is('san-pham') ) active  @endif">
				<span><i class="fa-solid fa-pizza-slice"></i>Sản phẩm</span>
			</a>
		</li>
		@endrole
		<li class="menu-item">
			<a href="{{url('/dat-hang')}}" class="@if(\Request::is('dat-hang') ) active  @endif">
				<span><i class="fa-solid fa-clipboard-check"></i>Đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/lich-su-dat-hang')}}" class="@if(\Request::is('lich-su-dat-hang') ) active  @endif">
				<span><i class="fa-solid fa-clock-rotate-left"></i>Lịch sử đặt hàng</span>
			</a>
		</li>
		@role('admin|daily')
		<li class="menu-item">
			<a href="{{url('/lich-su')}}" class="@if(\Request::is('lich-su') ) active  @endif">
				<span><i class="fa-solid fa-list-check"></i>Quản lý đơn hàng</span>
			</a>
		</li>
		@endrole
		<li class="menu-item">
			<a href="{{url('/danh-sach-doi-tac')}}" class="@if(\Request::is('danh-sach-doi-tac') ) active  @endif">
				<span><i class="fa-regular fa-rectangle-list"></i>Danh sách đối tác</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/dang-ky')}}" class="@if(\Request::is('dang-ky') ) active  @endif">
				<span><i class="fa-solid fa-user-plus"></i>Đăng ký thành viên</span>
			</a>
		</li>
		
		@role('admin')
		<li class="menu-item">
			<a href="{{url('/setting-hoa-hong-truc-tiep')}}" class="@if(\Request::is('setting-hoa-hong-truc-tiep') ) active  @endif">
				<span><i class="fa-solid fa-fan"></i>Cài đặt hoa hồng trực tiếp</span>
			</a>
		</li>

		<li class="menu-item">
			<a href="{{url('/setting-banner')}}" class="@if(\Request::is('setting-banner') ) active  @endif">
				<span><i class="fa-solid fa-image"></i>Cài đặt ảnh banner</span>
			</a>
		</li>

		<!-- <li class="menu-item">
			<a href="{{url('/sales_manager')}}" class="@if(\Request::is('sales_manager') ) active  @endif">
				<span><i class="fa-solid fa-bars-progress"></i>Quản lý bán hàng</span>
			</a>
		</li> -->
		
		<li class="menu-item">
			<a href="{{route('napDiem')}}" class="@if(\Request::is('nap-diem') ) active  @endif">
				<span><i class="fa-solid fa-plus-minus"></i>Nạp điểm cho tài khoản admin</span>
			</a>
		</li>

		<li class="menu-item">
			<a href="{{route('doanh-so-ban-hang')}}" class="@if(\Request::is('doanh-so-ban-hang') ) active  @endif">
				<span><i class="fa-solid fa-trophy"></i>Doanh số bán hàng</span>
			</a>
		</li>
		@endrole

		@role('admin|daily')
		<li class="menu-item">
			<a href="{{route('lich-su-chuyen-diem')}}" class="@if(\Request::is('lich-su-chuyen-diem') ) active @endif">
				<span><i class="fa-solid fa-trophy"></i>Lịch sử chuyển điểm hoa hồng</span>
			</a>
		</li>
		@endrole

		<li class="menu-item">
			<a href="{{route('lich-su-nhan-diem')}}" class="@if(\Request::is('lich-su-nhan-diem') ) active @endif">
				<span><i class="fa-solid fa-trophy"></i>Lịch sử hoa hồng được hưởng</span>
			</a>
		</li>

		<li>
			<div class="support">
				<p><i class="fa-solid fa-phone"></i>: 0329385699 </p>
				<p><i class="fa-solid fa-envelope"></i>: luckymilk42@gmail.com </p>
				<p><a class="p-2 btn" href="{{url('/logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>: Đăng xuất</a></p>
			</div>
		</li>
	</ul>
</nav>
