@extends('user_template.layouts.template')
@section('main-content')
<br><br><br>
<h2>Add Cart Page</h2>

@if (session()->has('message'))

<div class="alert alert-success">
    {{ session()->get('message') }}
</div>

@elseif(session() -> has('quantityOut'))

<div class="alert alert-warning">
    {{ session()->get('quantityOut') }}
</div>

@elseif(session() -> has('outOfStock'))
<div class="alert alert-warning">
    {{ session()->get('outOfStock') }}
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="table-responsive">
                <table class="table">
                    @if($cart_item->isEmpty())
                    <tr>
                        <td class="border-0 text-center align-middle">Your cart is empty</td>
                    </tr>

                    @else

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
                        {{$item->product_id}}
                        @php
                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                        $img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                        @endphp
                        <td><img src="{{ asset($img) }}" style="height: 50px"></td>
                        <td>{{$product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}€</td>
                        <td><a href="{{ route('removeitem', $item->id) }}" class="btn btn-danger">Remove</a></td>
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
                        <td><a href="{{route('shippingaddress')}}" class="btn btn-danger ">Checkout Now</a></td>
                    </tr>
                    @endif

                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection()