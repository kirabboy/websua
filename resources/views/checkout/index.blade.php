@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')

<!--Main layout-->
<main class="mt-5">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">GỬI ĐƠN HÀNG</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" method="post" action="">
            @csrf

            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-md-6 mb-3">
                  <label for="firstName" class="">Tên người nhận</label>
                  <input type="text" id="firstName" class="form-control" name="full_name"  placeholder="Nhập tên">
              </div>
             
              <div class="md-form col-md-6 mb-3">
                <label for="address" class="">Số điện thoại nhận hàng</label>
                <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại nhận hàng" name="phone">
              </div>
              <div class="md-form mb-3 col-md-12">
                <label for="address" class="">Địa chỉ giao hàng</label>
                <input type="text" id="address" class="form-control" placeholder="Nhập số nhà, tên dường" name="street_address">
              </div>

            </div>

            <div class="form-row">
                    <div class="form-group col-md-4">
                        <select name="sel_province" class="form-control select2" data-placeholder=" Cấp tỉnh " required>
                            <option value=""> Cấp tỉnh </option>
                            @foreach ($province as $value)
                            <option value="{{ $value->matinhthanh }}">{{ $value->tentinhthanh }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control select2" name="sel_district" data-placeholder=" Cấp huyện " required>
                            <option value=""> Cấp huyện </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control select2" name="sel_ward" data-placeholder=" Cấp xã " required>
                            <option value=""> Cấp xã </option>
                        </select>
                    </div>
                </div>
            <div class="row">
              <div class="form-group col-md-12">
                <select id="AgencyId" name="trungtam_pp" class="form-control">
                    <option value="1">Chọn trung tâm</option>
                    @foreach ($trungtam_phanphoi as $value)
                        <option value="{{$value->id}}">
                            {{$value->tentrungtam}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">GỬI ĐƠN HÀNG</button>
 
          </form>

        </div>
        <!--/.Card-->

      </div>
      
      <div class="col-md-4 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Giỏ hàng của bạn</span>
          <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
        </h4>

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
          @foreach ($carts as $cart)
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">{{$cart->name}} x {{$cart->qty}}</h6>

            </div>
            <span class="text-muted">{{number_format($cart->price * $cart->qty)}} VNĐ</span>
          </li>
          @endforeach
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền (VNĐ)</span>
            <strong>{{$total}}</strong>
          </li>
        </ul>
      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->

@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/js/shipping.js') }}"></script>
<script src="{{ asset('public/js/register.js') }}"></script>
@endpush