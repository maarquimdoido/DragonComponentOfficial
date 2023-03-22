@extends('user_template.layouts.template')
@section('main-content')
<h2>Add Cart Page</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
     </div>
    @endif
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="table-responsive">
                <table  class="table">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach($cart_item as $item)
                        <tr>
                            <td>{{$item->product_img}}</td>
                            <td>{{$item->product_id}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td><a href="" class="btn btn-warning">Remove</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection()