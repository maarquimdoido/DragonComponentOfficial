@extends('user_template.layouts.template')
@section('main-content')
<h2>Final Checkout</h2>
<div class="row">
    <div class="col-7">
        <div class="box_main">
            <h3>Produt Will Send At </h3>
            <p>City Name - {{ $shipping_address->city_name }}</p>
            <p>Street Address - {{ $shipping_address->street_info }}</p>
            <p>Postal Code - {{ $shipping_address->postal_code }}</p>
            <p>Phone Number - {{ $shipping_address->phone_number }}</p>
        </div>
    </div>

    <div class="col-5">
        <div class="box_main">
            <h3>Your Final Products Are</h3>
            <div class="table-responsive">
                <table  class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($cart_item as $item)
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                            @endphp
                            <td>{{$product_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}€</td>
                        </tr>
                        @php
                            $total = $total + $item->price;
                        @endphp
                @endforeach
                    <tr>
                        <td></td>
                        <td class="fw-bold">Total</td>
                        <td class="text-center">{{$total}}€</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <form action="" method="POST">
        @csrf
        <input type="submit" value="Cancel Order" class="btn btn-danger mr-3">
    </form>

    <form action="" method="POST">
        @csrf
        <input type="submit" value="Place Order" class="btn btn-primary ">
    </form>
</div>
@endsection()
