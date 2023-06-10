@extends('admin.layouts.template')
@section('page_title')
Users Verifieds - Dragon Component
@endsection
@section('content')
<div class="container my-5">
    <div class="card ">
        <div class="card-title">
            <h2 class="text-center my-4">Users</h2>
        </div>
        <div class="card-body">

            @if($users->isEmpty())
            <div class="text-center">
                <h4>Empty</h4>
            </div>

            @else

            <table class="table">
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Created</th>
                    <th class="text-center">Email Verified</th>
                    <th class="text-center">action</th>

                </tr>
                @foreach($users as $crrUser )
                <tr>
                    <form action="{{route('completedorder')}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$crrUser->id}}" name="id">
                        <td class="text-center">
                            <img width="70" height="70" title="{{$crrUser->id}}" alt="user icon with id= {{$crrUser->id}}" src="{{asset('dashboard/assets/img/user_img.png')}}">
                        </td>
                        <td class="text-center">{{$crrUser->name}}</td>
                        <td class="text-center">{{$crrUser->email}}</td>
                        <td class="text-center">{{$crrUser->created_at}}</td>
                        <td class="text-center">@if($crrUser->email_verified_at != null)True @else False @endif </td>
                        <td>
                            <input class="btn btn-success" type="submit" value="See more(not working yet)">
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
