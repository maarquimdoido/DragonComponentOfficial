@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Confirmed Orders</h2>
    <table class="table">
        <tr>
            <th>User ID</th>
            <th>Order ID</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach($confirmed_orders as $order )
        <tr>
            <td>
                {{ $order->userid }}
            </td>
            <td>
                {{ $order->id }}
            </td>
            <td>
            {{ $order->total_price }}€
            </td>
            <td>
            {{ $order->status }}
            </td>
        </tr>
        @endforeach
    </table>
@endsection
