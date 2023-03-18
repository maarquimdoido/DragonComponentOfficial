@extends('admin.layouts.template')
@section('page_title')
Add Product - Dragon Component
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Add Product</h4>
<div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">New Product</h5>
                      <small class="text-muted float-end">Insert Information</small>
                    </div>
                    <div class="card-body">
                      <form action="" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Name" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="category_name" name="category_name" placeholder="Price" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="category_name" name="category_name" placeholder="Number" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                          <div class="col-sm-10">
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                          <div class="col-sm-10">
                                <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                          <div class="col-sm-10">
                          <select class="form-select" id="category" name="category" aria-label="Default select example">
                          <option selected>Select</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Select SubCategory</label>
                          <div class="col-sm-10">
                          <select class="form-select" id="category" name="category" aria-label="Default select example">
                          <option selected>Select</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
</div>
@endsection