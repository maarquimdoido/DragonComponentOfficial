@extends('admin.layouts.template')
@section('page_title')
Add Product - Dragon Component
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Add Product</h4>
<div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add New Product</h5>
                      <small class="text-muted float-end">Insert Information</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Number" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                          <div class="col-sm-10">
                                <textarea class="form-control" name="product_short_des" id="product_short_des" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                          <div class="col-sm-10">
                                <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                          <div class="col-sm-10">
                          <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
                          <option selected>Select</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                          @endforeach
                        </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Select SubCategory</label>
                          <div class="col-sm-10">
                          <select class="form-select" id="product_subcategory_id" name="product_subcategory_id" aria-label="Default select example">
                          <option selected>Select</option>
                          @foreach ($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                          @endforeach
                        </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" id="product_img" name="product_img" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn text-white" style="background-color:#dc3545;">Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>
@endsection
