@extends('admin.layouts.template')
@section('page_title')
Pending Orders - Dragon Component
@endsection
@section('content')
<div class="container my-5">
    <div class="card ">
        <div class="card-title">
            <h2 class="text-center my-4">Pending Orders</h2>
        </div>
        <div class="card-body">

            @if($pending_orders->isEmpty())
            <div class="text-center">
                <h4>Empty</h4>
            </div>
            
            @else

            <table class="table">
                <tr>
                    <th class="text-center">User Id</th>
                    <th class="text-center">Shipping Information</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total Will Pay</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach($pending_orders as $order )
                <tr>
                    <form action="{{route('completedorder')}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$order->id}}" name="id">
                        <td>{{$order->userid}}</td>
                        <td>
                            <ul>
                                <li>Phone number - {{$order->shipping_phoneNumber}}</li>
                                <li>City - {{$order->shipping_city}}</li>
                                <li>Postal Code - {{$order->shipping_postalcode}}</li>
                                <li>Street Info - {{$order->shipping_streetinfo}}</li>
                                <li>Email - {{$order->email}}</li>
                            </ul>
                        </td>
                        <td class="text-center">{{$order->product_name}}</td>
                        <td class="text-center">{{$order->quantity}}</td>
                        <td class="text-center">{{$order->total_price}} €</td>
                        <td class="text-center">{{$order->status}}</td>
                        <td>
                            <input class="btn btn-success" type="submit" value="Confirm Order">
                        </td>
                    </form>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
@endsection