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
                  <input type="text" id="firstName" class="form-control" name="first_name" placeholder="">

                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6 mb-2">

                <!--lastName-->
                <div class="md-form">
                  <label for="lastName" class="">Họ</label>
                  <input type="text" id="lastName" class="form-control" name="last_name" placeholder="">

                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Username-->
            <!-- <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div> -->
            <!--address-->
            <div class="md-form mb-5">
              <label for="address" class="">Địa chỉ</label>
              <input type="text" id="address" class="form-control" placeholder="1234 Main St" name="street_address">

            </div>

            <!--address-2-->
            <!-- <div class="md-form mb-5">
                <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                <label for="address-2" class="">Address 2 (optional)</label>
              </div> -->

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-lg-6 col-md-12 mb-4">

                <label for="country">Quốc gia</label>
                <!-- <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select> -->
               
              <input type="text" id="address" class="form-control" placeholder="" name="country">

            </div>
                <!-- <div class="invalid-feedback">
                  Please select a valid country.
                </div> -->

           
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-6 col-md-6 mb-4">

                <label for="state">Tỉnh</label>
                <input type="text" id="province" class="form-control" placeholder="" name="province">
                <!-- <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div> -->

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <!-- <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>

              </div> -->
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div> -->



            <!-- <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" value="pay_later" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div> -->
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

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
          <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li> -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền (VNĐ)</span>
            <strong>{{$total}}</strong>
          </li>
        </ul>
        <!-- Cart -->

        <!-- Promo code -->
        <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form> -->
        <!-- Promo code -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->

@endsection