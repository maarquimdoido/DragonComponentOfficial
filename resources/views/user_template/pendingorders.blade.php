@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Pending Orders</h2>
@if(request()->has('success'))

<div class="alert alert-success">
    Your order has been placed Successfully
</div>

@elseif(request()->has('warning'))

<div class="alert alert-warning">
    Oops... Something went wrong
</div>

@endif

@if($pending_orders->isEmpty())

<div class="text-center">
    Empty
</div>
@else
<table class="table">
    <tr>
        <th>User ID</th>
        <th>Product</th>
        <th>Price</th>
        <th>Status</th>
    </tr>

    @foreach($pending_orders as $order )
    <input hidden="text" value="{{$order->userid}}" name="userid">
    <tr>
        <td>
            {{ $order->userid }}
        </td>

        <td>
            {{ $order->product_name }}
        </td>
        <td>
            {{ $order->total_price }}€
        </td>
        <input hidden="text" value="{{$order->status}}" name="status">
        <td>
            <input type="button" class="btn btn-info disabled" value="{{ $order->status }}"></input>
        </td>
    </tr>
    @endforeach
</table>
@endif
@endsection