@extends('user_template.layouts.template')
@section('main-content')
<div class="fashion_section">
   <div id="main_slider">
      <div class="container">
         <h1 class="fashion_taital">{{ $category->category_name }} ( {{ $category -> product_count }} )</h1>
         <div class="fashion_section_2">
            <div class="row">
               @foreach ($products as $product)
               <div class="col-lg-4 col-sm-4">
                  <div class="box_main">
                     <h4 class="shirt_text">{{ $product->product_name }}</h4>
                     <p class="price_text">Price <span style="color: #262626;">{{ $product->price }} € </span></p>
                     <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                     <div class="btn_main">
                        <div class="buy_bt">
                           <form action="{{route('addproducttocart')}}" method="POST">
                              @csrf
                              <input hidden="text" value="{{$product->id}}" name="product_id">
                              <input hidden="text" value="{{$product->price}}" name="price">
                              <input hidden="text" value="1" name="quantity">
                              <br>
                              <input class="btn btn-danger" type="submit" @if($product->quantity == 0) disabled
                              value="Out of Stock" @else value="Buy Now" @endif>
                           </form>
                        </div>
                        <div class="seemore_bt"><a
                              href="{{route('singleproduct', [$product->id, $product->slug])}}"><img style="width:30px"
                                 src="{{asset('home/images/logoMeh.png')}}">See More</a></div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection()