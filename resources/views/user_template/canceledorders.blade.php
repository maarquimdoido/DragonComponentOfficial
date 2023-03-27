@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Canceled Orders</h2>
    <table class="table">
        <tr>
            <th>Product ID</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order )
        <tr>
            <td>
                {{ $order->product_id }}
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
