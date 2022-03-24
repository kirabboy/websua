<nav id="sidebar" class="navbar-nav sidebar-main sidebar-dark accordion">
	<div class="logo-brand">
		<div class="sidebar-logo d-flex flex-column text-center">

			<a href="{{url('/')}}" class="sidebar-brand-icon">
				<img src="{{ asset('image/logo.png') }}" alt="" width="80px">
			</a>
			<div class="box-text">
				<h2> <a href="thong-tin-ca-nhan">{{Auth::user()->name}}</a></h2>
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
			<a href="{{url('/quan-ly-nguoi-dung')}}" class="@if(\Request::is('user-management') ) active  @endif">
				<span><i class="fa-solid fa-user"></i>Quản lý Users</span>
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
				<span><i class="fa-solid fa-book"></i>Tài liệu</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/products')}}" class="@if(\Request::is('products') ) active  @endif">
				<span><i class="fa-solid fa-ice-cream"></i>Sản phẩm</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/order')}}" class="@if(\Request::is('order') ) active  @endif">
				<span><i class="fa-brands fa-first-order-alt"></i>Đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/promotion')}}" class="@if(\Request::is('promotion') ) active  @endif">
				<span><i class="fa-solid fa-gift"></i>Đổi điểm </span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/order-history')}}" class="@if(\Request::is('order-history') ) active  @endif">
				<span><i class="fa-solid fa-clock-rotate-left"></i>Lịch sử đặt hàng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/list-partner')}}" class="@if(\Request::is('list-partner') ) active  @endif">
				<span><i class="fa-solid fa-address-book"></i>Danh sách đối tác</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/dang-ky')}}" class="@if(\Request::is('dang-ky') ) active  @endif">
				<span><i class="fa-solid fa-circle-plus"></i>Đăng ký</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/trung-tam-phan-phoi')}}" class="@if(\Request::is('trung-tam-phan-phoi') ) active  @endif">
				<span><i class="fa-solid fa-building"></i>Trung tâm phân phối</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/hoa-hong-duoc-huong')}}" class="@if(\Request::is('hoa-hong-duoc-huong') ) active  @endif">
				<span><i class="fa-solid fa-percent"></i>Hoa hồng được hưởng</span>
			</a>
		</li>
		<li class="menu-item">
			<a href="{{url('/lich-su-mua-hang')}}" class="@if(\Request::is('lich-su-mua-hang') ) active  @endif">
				<span><i class="fa-solid fa-clock-rotate-left"></i>Lịch sử mua hàng hệ thống</span>
			</a>
		</li>
		<!-- <li><hr></li>
		<li>
			<hr>
		</li> -->

		<li class="menu-item">
			<a href="{{url('/setting-hoa-hong-truc-tiep')}}" class="@if(\Request::is('setting-hoa-hong-truc-tiep') ) active  @endif">
				<span><i class="fa-solid fa-fire"></i>Cài đặt hoa hồng trực tiếp</span>
			</a>
		</li>

		<li class="menu-item">
			<a href="{{url('/setting-banner')}}" class="@if(\Request::is('setting-banner') ) active  @endif">
				<span><i class="fa-solid fa-image"></i>Cài đặt ảnh banner</span>
			</a>
		</li>
		<li class="menu-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Components</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="py-2 pl-4 collapse-inner rounded">
					<a class="collapse-item @if(\Request::is('sales_manager') ) active  @endif" href="{{url('/sales_manager')}}">Quản lý bán hàng</a>
					<a class="collapse-item @if(\Request::is('list_manager') ) active  @endif" href="{{url('/list_manager')}}">Danh sách quản lý</a>
				</div>
			</div>
		</li>


		<li class="nav-item">

		</li>

		<li>
			<div class="support">
				<p><i class="fa-solid fa-envelope"></i>: 0969979400</p>
				<p><i class="fa-solid fa-phone"></i>: forvietvn@gmail.com</p>
			</div>
		</li>
	</ul>
</nav>