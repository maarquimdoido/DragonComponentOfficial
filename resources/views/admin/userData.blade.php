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
                        <th class="text-center">Type</th>
                        <th class="text-center">Action</th>
                    </tr>

                    @php
                    $uid = $user->id;
                    $row = DB::table('role_user')->where('user_id',"{$uid}")->first();
                    $crrState = $row->user_type;
                    $crrRoleId = $row->role_id;
                    @endphp

                    <tr>
                        <td class="text-center">{{$user->id}}</td>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->updated_at}}</td>
                        <td class="text-center">{{$crrState}}</td>

                        @if($crrRoleId == 2)

                        <td class="text-center">
                            <form method="POST" action="{{ route('admin.userToAdmin', ['id' => $user->id]) }}">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Turn admin">
                            </form>
                        </td>

                        @elseif($crrRoleId == 1)

                        @if($uid == Auth::user()->id)

                        <td class="text-center">
                                <input type="submit" class="btn" title="You cannot turn yourself into normal user" style="background-color:darkgray" value="Yourself">
                        </td>

                        @else

                        <td class="text-center">
                            <form method="POST" action="{{ route('admin.adminToUser', ['id' => $user->id]) }}">
                                @csrf
                                <input type="submit" class="btn btn-warning" value="Turn user">
                            </form>
                        </td>

                        @endif
                        @endif

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