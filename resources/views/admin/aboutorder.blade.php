@extends('admin.layouts.template')
@section('page_title')
Order Details - Dragon Component
@endsection
@section('content')
<div class="container my-5">
    <div class="card ">
        <div class="card-title">
            <h2 class="text-center my-4">Order Details</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Contact Information</th>
                    <th class="">Shipping Adress</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total Payed</th>
                    <th class="text-center">Status</th>
                </tr>
                @foreach($pending_orders as $order )
                <tr>
                    <td>
                        <ul>
                            <li>Email - {{$order->email}}</li>
                            <li>Phone number - {{$order->shipping_phoneNumber}}</li>
                        </ul>
                    </td>
                    @csrf
                    <input type="hidden" value="{{$order->id}}" name="id">
                    <td class="">
                        <ul>
                            <label>{{$order->shipping_city}}</label><br>
                            <label>{{$order->shipping_streetinfo}}</label><br>
                            <label>{{$order->shipping_postalcode}}</label>
                        </ul>
                    </td>
                    <td class="text-center">{{$order->product_name}}</td>
                    <td class="text-center">{{$order->quantity}}</td>
                    <td class="text-center">{{$order->total_price}} €</td>
                    <td class="text-center">
                        <input class="btn btn-success disabled" type="button" value="{{$order->status}}">
                    </td>
                    <td>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection