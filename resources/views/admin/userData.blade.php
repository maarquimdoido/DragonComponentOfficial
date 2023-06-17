@extends('admin.layouts.template')
@section('page_title')
User Details- Dragon Component
@endsection
@section('content')
<div class="container">


<div class="container my-5">
        <div class="card ">
            <div class="card-title">
                <h2 class="text-center my-4">Details of {{ $user->name }}</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="text-center">User Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Last Login</th>
                    </tr>

                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">{{$user->updated_at}}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="card ">
            <div class="card-title">
                <h2 class="text-center my-4">Orders of {{ $user->name }}</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="text-center">Order ID</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">City</th>
                        <th class="text-center">Street</th>
                        <th class="text-center">Postal Code</th>
                        <th class="text-center">TOTAL PRICE</th>
                        <th class="text-center">STATUS</th>

                    </tr>
                    @foreach ( $userOrders as $user2)
                        <tr>
                            <td class="text-center">{{$user2->id}}</td>
                            <td class="text-center">{{$user2->shipping_phoneNumber}}</td>
                            <td class="text-center">{{$user2->shipping_city}}</td>
                            <td class="text-center">{{$user2->shipping_streetinfo}}</td>
                            <td class="text-center">{{$user2->shipping_postalcode}}</td>
                            <td class="text-center">{{$user2->total_price}}€</td>
                            <td class="text-center"><button class="btn btn-info disabled">{{$user2->status}}</button></td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
