@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h2>Confirmed Orders</h2>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
     </div>
    @endif

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
