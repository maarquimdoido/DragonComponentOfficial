@extends('admin.layouts.template')
@section('page_title')
All Category - Dragon Component
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> All Categories</h4>
<div class="card">
                <h5 class="card-header">Availabe Categories Information</h5>
                @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                </div>
                @endif
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Sub Category</th>
                        <th>Slug</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($categories as $category)

                      <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->subcategory_count}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{ route('editcategory', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deletecategory', $category->id) }}" class="btn btn-warning">Delete</a>
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
