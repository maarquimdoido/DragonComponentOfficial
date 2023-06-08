@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Canceled Orders</h2>
@if($canceled_orders->isEmpty())
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
    @foreach($canceled_orders as $order )
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
        <td>
            <input type="button" class="btn btn-danger disabled" value="{{ $order->status }}"></input>
        </td>
    </tr>
    @endforeach
</table>
@endif
@endsection