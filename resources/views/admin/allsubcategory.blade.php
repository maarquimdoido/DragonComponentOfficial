@extends('admin.layouts.template')
@section('page_title')
All SubCategory - Dragon Component
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> All Sub Categories</h4>
              @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                </div>
                @endif
                <div class="card">
                <h5 class="card-header">Availabe Sub Categories Information</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Sub Category Name</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        @foreach ($allsubcategories as $subcategory)
                        <td>{{$subcategory->id}}</td>
                        <td>{{$subcategory->subcategory_name}}</td>
                        <td>{{$subcategory->category_name}}</td>
                        <td>{{$subcategory->product_count}}</td>
                        <td>
                            <a href="{{ route('editsubcat', $subcategory->id)}}" class="btn text-white" style="background-color:#dc3545;">Edit</a>
                            <a href="{{ route('deletesubcat', $subcategory->id)}}" class="btn text-white" style="background-color:#dc3545;">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
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
