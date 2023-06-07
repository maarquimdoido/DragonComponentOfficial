@extends('admin.layouts.template')
@section('page_title')
Completed Orders - Dragon Component
@endsection
@section('content')
<div class="container my-5">
    <div class="card ">
        <div class="card-title">
            <h2 class="text-center my-4">Confirmed Orders</h2>
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
                    <th class="text-center">Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total Will Pay</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                    <th>Details</th>
                </tr>
                @foreach($pending_orders as $order )
                <tr>
                    <td class="text-center">{{$order->userid}}</td>

                    <form action="{{route('canceledorder')}}">
                        @csrf
                        <input type="hidden" value="{{$order->id}}" name="id">
                        <td class="text-center">{{$order->product_name}}</td>
                        <td class="text-center">{{$order->quantity}}</td>
                        <td class="text-center">{{$order->total_price}} €</td>
                        <td class="text-center">{{$order->status}}</td>
                        <td class="text-center">
                            <input type="submit" value="Cancel"  class="btn text-white" style="background-color:#dc3545;">
                        </td>

                    </form>
                    <td>
                        <form action="{{route('aboutorder')}}">
                            <input type="submit" value="See More" class="btn btn-info text-white">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
@endsection