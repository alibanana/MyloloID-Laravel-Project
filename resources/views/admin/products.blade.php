@extends('layouts.main-admin')

@section('title', 'Admin Products')

@section('content')
<!-- Page Heading -->
<div class="row pb-2">
  <div class="col-6">
    <h2>Products Table & Control (On Progress)</h2>
  </div>
  {{-- Dynamic Categories Dropdown --}}
  <div class="col-6 d-flex justify-content-end">
    <div class="dropdown">
      <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $active_category->category }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($categories as $category)
        <a class="dropdown-item @if ($category->category == $active_category->category) active
        @endif" href="/admin/products/category/{{ $category->category }}">{{ $category->category }}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- Main table --}}
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col"></th>
      <th scope="col">Price</th>
      <th scope="col">Available</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td class="product-thumbnail p-0 text-center">
        <img src="/images/adminpage/Product1.jpg" alt="" class="img-thumbnail">
      </td>
      <td>ProductName</td>
      <td>IDR XXXK</td>
      <td>Yes/No</td>
      <td>
        {{-- <form action="{{ route('file.destroy', $datas->id) }}" method="post"> --}}
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        {{-- <a href="{{ route('file.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a> --}}
        <a href="" class=" btn btn-sm btn-primary">Details</a>
        <button class="btn btn-sm btn-danger" type="submit"
          onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
        {{-- </form> --}}
      </td>
    </tr>
  </tbody>
</table>

{{-- Add new Product --}}
<hr />
<div class="d-flex justify-content-center">
  <a class="btn btn-primary justify-content-center" href="{{ route('products.create') }}" role="button">Add New
    Product</a>
</div>

@endsection