@extends('admin.layouts.template')
@section('page_title')
All Products - Dragon Component
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> All Produtcs</h4>
              @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                </div>
                @endif
            <div class="card">
                <h5 class="card-header">Availabe Products Information</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                          <img  style="height: 100px;"src="{{asset($product->product_img)}}" alt="">
                          <br>
                            <a href="{{route('editproductimg', $product->id)}}" class="btn btn-danger">Update Image</a>
                        </td>
                        <td>{{$product->price}}  €</td>
                        <td>
                            <a href="{{route('editproduct', $product->id)}}" class="btn text-white" style="background-color:#dc3545;">Edit</a>
                            <a href="{{route('deleteproduct', $product->id)}}" class="btn text-white" style="background-color:#dc3545;">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                          <div class="dropdown">
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@endsection
