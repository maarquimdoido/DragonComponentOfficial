@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
Pending Orders
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
     </div>
    @endif
@endsection
