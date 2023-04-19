@extends('admin.layouts.template')
@section('page_title')
    Completed Orders - Dragon Component
@endsection
@section('content')
    <div class="container my-5">
        <div class="card ">
            <div class="card-title">
                <h2 class="text-center my-4">Completed Orders</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="text-center">User Id</th>
                        <th>Shipping Information</th>
                        <th class="text-center">Product Id</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total Will Pay</th>
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
                                </ul>
                            </td>
                            <form action="{{route('canceledorder')}}">
                                @csrf
                                <input type="hidden" value="{{$order->id}}" name="id">
                                <td class="text-center">{{$order->product_id}}</td>
                                <td class="text-center">{{$order->quantity}}</td>
                                <td class="text-center">{{$order->total_price}} €</td>
                                <td class="text-center">
                                        <input class="btn btn-success disabled" type="button" value="{{$order->status}}">
                                        <input type="submit" value="Cancelar"  class="btn text-white" style="background-color:#dc3545;">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
