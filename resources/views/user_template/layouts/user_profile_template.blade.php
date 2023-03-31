@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                    <ul>
                        <li><a href="{{route('userprofile')}}"><h4>Dashboard</h4></a></li>
                        <li><a href="{{route('orders')}}"><h4>Orders</h4></a></li>
                        <li><a href="{{route('pendingorders')}}"><h4>Pending Orders</h4></a></li>
                        <li><a href="{{route('canceledorders')}}"><h4>Canceled Orders</h4></a></li>
                    </ul>
            </div>
        </div>
            <div class="col-lg-8">
                <div class="box_main">
                        @yield('profilecontent')
                </div>
            </div>
    </div>
</div>
@endsection()
