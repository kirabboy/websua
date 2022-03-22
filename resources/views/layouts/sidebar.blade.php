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
			<a href="{{url('/user-management')}}" class="@if(\Request::is('user-management') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Quản lý Users</span>
			</a>
		</li>
		@endrole
		<li class="menu-item">
			<a href="{{url('/')}}" class="@if(\Request::is('/') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Bảng điều khiển</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/document')}}" class="@if(\Request::is('document') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Tài liệu</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/products')}}" class="@if(\Request::is('products') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Sản phẩm</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/order')}}" class="@if(\Request::is('order') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/promotion')}}" class="@if(\Request::is('promotion') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Đổ điểm </span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/order-history')}}" class="@if(\Request::is('order-history') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Lịch sử đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/list-partner')}}" class="@if(\Request::is('list-partner') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Danh sách đối tác</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/register')}}" class="@if(\Request::is('register') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Đăng ký</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/distribution')}}" class="@if(\Request::is('distribution') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Trung tâm phân phối</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/transactions')}}" class="@if(\Request::is('transactions') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Hoa hồng được hưởng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/statistic')}}" class="@if(\Request::is('statistic') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Lịch sử mua hàng hệ thống</span>
			</a>
		</li>
		<!-- <li><hr></li>
		<li>
			<hr>
		</li> -->

		<li class="menu-item">
			<a href="{{url('/setting-hoa-hong-truc-tiep')}}" class="@if(\Request::is('setting-hoa-hong-truc-tiep') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Cài đặt hoa hồng trực tiếp</span>
			</a>
		</li>

		<li class="menu-item">
			<a href="{{url('/setting-banner')}}" class="@if(\Request::is('setting-banner') ) active  @endif">
				<span><i class="fa-solid fa-table"></i>Cài đặt ảnh banner</span>
			</a>
		</li>

		<li>
			<div class="support">
				<p><i class="fa-solid fa-envelope"></i>: 0969979400</p>
				<p><i class="fa-solid fa-phone"></i>: forvietvn@gmail.com</p>
			</div>
		</li>
	</ul>
</nav>