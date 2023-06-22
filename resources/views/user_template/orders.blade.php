@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Confirmed Orders</h2>
@if($confirmed_orders->isEmpty())
<div class="text-center">
    Empty
</div>
@else

<table class="table">
    <tr>
        <th class="text-center">User ID</th>
        <th class="text-center">Order Ref.</th>
        <th class="text-center">Product</th>
        <th class="text-center">Price</th>
        <th class="text-center">Status</th>
    </tr>
    @foreach($confirmed_orders as $order )

    <input hidden="text" value="{{$order->userid}}" name="userid">
    <tr>
        <td class="text-center">
            {{ $order->userid }}
        </td>
        <td class="text-center">
            {{ $order->id }}
        </td>
        <td class="text-center">
            {{ $order->product_name }}
        </td>
        <td class="text-center">
            {{ $order->total_price }}€
        </td>
        <td>
            <input type="button" class="btn btn-success disabled" value="{{ $order->status }}" />
        </td>
    </tr>
    @endforeach
</table>
@endif
@endsection