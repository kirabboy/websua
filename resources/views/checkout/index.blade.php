@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')

<!--Main layout-->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Thanh Toán</h2>

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
              <div class="col-md-6 mb-2">

                <!--firstName-->

                <div class="md-form ">
                  <label for="firstName" class="">Tên</label>
                  <input type="text" id="firstName" class="form-control" name="full_name" placeholder="">

                </div>

              </div>
             

            </div>
            
            <div class="md-form mb-5">
              <label for="address" class="">Địa chỉ</label>
              <input type="text" id="address" class="form-control" placeholder="1234 Main St" name="street_address">

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
            <div class="row">
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Thanh toán</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Giỏ hàng của bạn</span>
          <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
        </h4>

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
          @foreach ($carts as $cart)
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">{{$cart->name}} x {{$cart->qty}}

              </h6>

            </div>
            <span class="text-muted">{{$cart->price * $cart->qty}} VNĐ</span>
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
<script src="{{ asset('/js/shipping.js') }}"></script>
<script src="{{ asset('/js/register.js') }}"></script>
@endpush