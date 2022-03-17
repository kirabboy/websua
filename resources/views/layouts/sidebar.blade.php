<!-- Sidebar -->
<!-- Sidebar  -->
<nav id="sidebar" class="navbar-nav sidebar-main sidebar-dark accordion">
	<div class="logo-brand">
		<div class="sidebar-logo d-flex flex-column text-center">

			<a href="{{url('/')}}" class="sidebar-brand-icon">
				<img src="{{ asset('image/logo.png') }}" alt="" width="80px">
			</a>
			<div class="box-text">
				<h2>{{Auth::user()->name}}</h2>
				<span class="label-color">
					@if (Auth::user()->hasRole('admin')) Quản trị
					@elseif (Auth::user()->hasRole('distribution')) Trung tâm phân phối
					@elseif (Auth::user()->hasRole('agent')) Đại lý bán buôn
					@else Cộng tác viên
					@endif
				</span>
			</div>
			<!-- 	
	<div class="sidebar-brand-text mx-3">SB Adminss <sup>2</sup></div> -->
			</a>
		</div>
	</div>
	<ul class="side-nav">
		@role('admin')
		<li class="menu-item">
			<a href="{{url('/user-management')}}">
				<span><i class="fa-solid fa-table"></i>Quản lý Users</span>
			</a>
		</li>
		@endrole
		<li class="menu-item">
			<a href="{{url('/')}}">
				<span><i class="fa-solid fa-table"></i>Bảng điều khiển</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/document')}}">
				<span><i class="fa-solid fa-table"></i>Tài liệu</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/products')}}">
				<span><i class="fa-solid fa-table"></i>Đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/list-partner')}}">
				<span><i class="fa-solid fa-table"></i>Lịch sử đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/order-history')}}">
				<span><i class="fa-solid fa-table"></i>Danh sách đối tác</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/register')}}">
				<span><i class="fa-solid fa-table"></i>Đăng ký</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/distribution')}}">
				<span><i class="fa-solid fa-table"></i>Trung tâm phân phối</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/profile')}}">
				<span><i class="fa-solid fa-table"></i>Thông tin cá nhân</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/transactions')}}">
				<span><i class="fa-solid fa-table"></i>Hoa hồng được hưởng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/statistic')}}">
				<span><i class="fa-solid fa-table"></i>Lịch sử mua hàng hệ thống</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/support')}}">
				<span><i class="fa-solid fa-table"></i>Trợ giúp</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="logout">
				<span><i class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</span>
			</a>
		</li>
		<!-- <li><hr></li>
		<li>
			<hr>
		</li> -->
		<li>
			<div class="support">
				<p><i class="fa-solid fa-envelope"></i>: 0969979400</p>
				<p><i class="fa-solid fa-phone"></i>: forvietvn@gmail.com</p>
			</div>
		</li>
	</ul>
</nav>