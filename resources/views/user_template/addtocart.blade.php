@extends('user_template.layouts.template')
@section('main-content')
<h2>Add Cart Page</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
     </div>
    @endif
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="table-responsive">
                <table  class="table">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($cart_item as $item)
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                $img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                            @endphp
                            <td><img src="{{ asset($img) }}" style="height: 50px"></td>
                            <td>{{$product_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}€</td>
                            <td><a href="{{ route('removeitem', $item->id) }}" class="btn btn-warning">Remove</a></td>
                        </tr>
                        @php
                            $total = $total + $item->price;
                        @endphp
                @endforeach
                @if($total > 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="fw-bold">Total</td>
                        <td class="text-center">{{$total}}€</td>
                            <td><a href="{{route('shippingaddress')}}" class="btn btn-primary ">Checkout Now</a></td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection()
