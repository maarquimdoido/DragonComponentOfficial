@extends('admin.layouts.template')
@section('page_title')
    Canceled Orders - Dragon Component
@endsection
@section('content')
    <div class="container my-5">
        <div class="card ">
            <div class="card-title">
                <h2 class="text-center my-4">Canceled Orders</h2>
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
                        <th>Shipping Information</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Status</th>
                    </tr>
                    @foreach($pending_orders as $order )
                        <tr>
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
                            <td class="text-center"><label>
                                    <input class="btn text-white disabled" type="button" style="background-color:#dc3545;" value="{{$order->status}}">
                                </label></td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
