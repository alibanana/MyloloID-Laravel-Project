@extends('layout/main')

@section('title', 'MyloloID Cart')

@section('container')

{{-- Home / Cart --}}
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
          class="text-black">Cart</strong></div>
    </div>
  </div>
</div>

{{-- Table Shopping Cart Web Version--}}
<div class="site-blocks-table d-none d-md-block table-wrapper-web">
  <table class="table table-hover table-borderless">
    {{-- <table> --}}
    <thead>
      <tr>
        <th class="product-thumbnail">Product</th>
        <th class="product-name"></th>
        <th class="product-price">Price</th>
        <th class="product-quantity">Quantity</th>
        <th class="product-total">Total</th>
      </tr>
    </thead>
    <tbody>
      <tr class="align-items-center text-dark">
        <td class="product-thumbnail">
          <img src="/images/cartpage/product1.jpg" alt="" class="img-thumbnail">
        </td>
        <td class="product-name">Mylo Crop Sleeve Denim</td>
        <td class="product-price">IDR 775k</td>
        <td class="product-quantity">
          <div class="input-group quantity-input text-align-center justify-content-center">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-primary minus-button js-btn-minus">&minus;</button>
            </div>
            <input type="text" class="form-control text-center quantity-text" value="1" readonly>
            <div class="input-group-append">
              <button type="button" class="btn btn-primary plus-button js-btn-plus">&plus;</button>
            </div>
          </div>
        </td>
        <td class="product-total">IDR 775k</td>
      </tr>
      <tr class="align-items-center text-dark">
        <td class="product-thumbnail">
          <img src="/images/cartpage/product2.jpg" alt="" class="img-thumbnail">
        </td>
        <td class="product-name">Mylo Half Ruffles Shirtdress</td>
        <td class="product-price">IDR 445k</td>
        <td class="product-quantity">
          <div class="input-group quantity-input text-align-center justify-content-center">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-primary minus-button js-btn-minus">&minus;</button>
            </div>
            <input type="text" class="form-control text-center quantity-text" value="1" readonly>
            <div class="input-group-append">
              <button type="button" class="btn btn-primary plus-button js-btn-plus">&plus;</button>
            </div>
          </div>
        </td>
        <td class="product-total">IDR 445k</td>
      </tr>
    </tbody>
  </table>
</div>

{{-- Table Shopping Cart Mobile Version --}}
<div class="d-md-none">
  <h1 class="text-black">TEST - CART - MOBILE</h1>
  <div class="card w-90">
    <div class="card-body">
      <div class="product-thumbnail">
        <img src="/images/cartpage/product1.jpg" alt="" class="rounded float-left" class="img-thumbnail"
          style="width:200px;height:200px;">
      </div>

      <h4 class="product-name" style="color:black" style="text-align:right">Mylo Crop Sleeve Denim</h4>
      <p class="product-price" style="color:black" style="text-align:right">IDR 775K</p>
      <p class="product-quantity">
        <div class="input-group quantity-input text-align-center justify-content-center">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-primary minus-button js-btn-minus">&minus;</button>
          </div>
          <input type="text" class="form-control text-center quantity-text" value="1" readonly>
          <div class="input-group-append">
            <button type="button" class="btn btn-primary plus-button js-btn-plus">&plus;</button>
          </div>
        </div>
    </div>

    <div class="card w-90">
      <div class="card-body">
        <div class="product-thumbnail">
          <img src="/images/cartpage/product2.jpg" alt="" class="rounded float-left" class="img-thumbnail"
            style="width:200px;height:200px;">
        </div>

        <h4 class="product-name" style="color:black" style="text-align:right">Mylo Half Ruffles Shirtdress</h4>
        <p class="product-price" style="color:black" style="text-align:right">IDR 445K</p>
        <p class="product-quantity">
          <div class="input-group quantity-input text-align-center justify-content-center">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-primary minus-button js-btn-minus">&minus;</button>
            </div>
            <input type="text" class="form-control text-center quantity-text" value="1" readonly>
            <div class="input-group-append">
              <button type="button" class="btn btn-primary plus-button js-btn-plus">&plus;</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

{{-- Coupon Form & Update Cart Button --}}
<div class="justify-content-xl-center coupon-cart-wrapper mt-4 mx-auto">
  <div class="row">
    {{-- First Col --}}
    <div class="col-md-7 col-lg-6">
      <div class="row mb-5">
        <div class="col-md-6 mb-3 mb-md-0">
          <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label class="text-black h4" for="coupon">Coupon</label>
          <p>Enter your coupon code if you have one.</p>
        </div>
        <div class="col-md-7 col-lg-8 mb-3 mb-md-0">
          <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
        </div>
        <div class="col-md-5 col-lg-4">
          <button class="btn btn-primary btn-sm">Apply Coupon</button>
        </div>
      </div>
    </div>
    {{-- Second Col --}}
    <div class="col-md-5 col-lg-6 mt-2 mb-4">
      <div class="row justify-content-center justify-content-xl-end">
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12 text-right text-sm-left border-bottom mb-5">
              <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <span class="text-black">Subtotal</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$230.00</strong>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <span class="text-black">Total</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black">$230.00</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center text-sm-left">
              <button class="btn btn-primary btn-sm" onclick="window.location='checkout.html'">
                Proceed To Checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection