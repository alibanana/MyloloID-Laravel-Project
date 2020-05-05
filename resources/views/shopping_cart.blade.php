@extends('layout/main')

@section('title', 'MyloloID Cart')

@section('container')

{{-- Table Shopping Cart Web Version--}}
<div class="site-blocks-table d-none d-md-block table-wrap">
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
      <div class = "product-thumbnail">
        <img src="/images/cartpage/product1.jpg" alt="" class="rounded float-left" class="img-thumbnail" style="width:200px;height:200px;">
      </div>

      <h4 class="product-name" style= "color:black" style="text-align:right">Mylo Crop Sleeve Denim</h4>
      <p class="product-price" style= "color:black" style="text-align:right">IDR 775K</p>
      <p class="product-quantity">
        <div class="input-group quantity-input text-align-center justify-content-center">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-primary minus-button js-btn-minus">&minus;</button>
          </div>
          <input type="text" class="form-control text-center quantity-text" value="1" readonly>
          <div class="input-group-append">
            <button type="button" class="btn btn-primary plus-button js-btn-plus" >&plus;</button>
          </div>    
    </div>
  </div>

  <div class="card w-90">
    <div class="card-body">
    <div class = "product-thumbnail">
        <img src="/images/cartpage/product2.jpg" alt="" class="rounded float-left" class="img-thumbnail" style="width:200px;height:200px;">
    </div>

    <h4 class="product-name" style= "color:black" style="text-align:right">Mylo Half Ruffles Shirtdress</h4>
    <p class="product-price" style= "color:black" style="text-align:right">IDR 445K</p>
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
@endsection