@extends('user_template.layouts.template')
@section('main-content')
<h2>Provide Your Shipping Information</h2>
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <form action="{{route('addshippingaddress')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number">
                </div>

                <div class="form-group">
                <label for="city_name">City</label>
                <input type="text" class="form-control" name="city_name">
                </div>

                <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" >
                </div>

                <div class="form-group">
                <label for="street_info">Street Adress</label>
                <input type="text" class="form-control" name="street_info">
                </div>

                <div class="form-group">
                <label for="street_info">Email</label>
                <input type="text" class="form-control" name="email">
                </div>

                <input type="submit" value="Next" class="btn btn-danger">
            </form>
        </div>
    </div>
</div>
@endsection()
