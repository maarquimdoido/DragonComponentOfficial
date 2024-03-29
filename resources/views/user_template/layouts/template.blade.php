@php
$categories = App\Models\Category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Dragon Component</title>
   <link rel="icon" type="image/x-icon" href="    {{asset('home/images/logoMeh.png')}}" />
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="shortcut icon" href="{{ asset('home/images/fav.jpg') }}" type="image/x-icon">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
   <!-- fevicon -->
   <link rel="icon" href="{{ asset('home/images/fevicon.png') }}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <link rel="stylesheet" type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  -->
   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
   <link rel="stylesoeet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>

<body>
   <!-- banner bg main start -->
   <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
         <div class="header_section_top">
            <div class="row">
               <div class="col-sm-12">
                  <div class="custom_menu">
                     <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('credits')}}">Credits</a></li>
                        <li><a href="{{ route('policy')}}">Policy</a></li>
                        <li><a href="{{ route('terms')}}">Terms</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top section start -->
      <!-- logo section start -->
      <div class="logo_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="logo"><a href="/"><img style="width:100px" src="{{asset('home/images/logoMeh.png')}}"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- logo section end -->
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               @auth
               <div class="dropdown">
                  <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     @foreach ($categories as $category)
                     <a href="{{ route('category', [$category->id, $category->slug]) }}"
                        class="dropdown-item">{{$category->category_name}}</a>
                     @endforeach
                  </div>
               </div>
               @endauth
               <div class="main">
                  <!-- Another variation with a button -->
                  <form>
                      <div class="input-group">
                         <input " type="search" name="search" class="form-control" placeholder="Search" >
                         <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit"
                               style="background-color:#30302e; border-color:#30302e ">
                               <i class="fa fa-search"></i>
                            </button>
                         </div>
                      </div>
                    </div>
                  </form>
               <div class="header_box">
                  <div class="login_menu">
                     <ul>

                        @auth

                        <li>
                           <div class="dropdown">
                              <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                 id="dropdownMenuButton">{{ Auth::user()->name }}</button>
                              <div class="dropdown-content dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 @can('admin')
                                 <a href="/admin/dashboard" target="_blank" class="dropdown-item text-dark"><span
                                       class="padding_10">Dashboard</span></a>
                                 @else

                                 <a href="/add-to-cart" class="dropdown-item text-dark"><span
                                       class="padding_10">Cart</span></a>
                                 <a href="/user-profile" class="dropdown-item text-dark"><span
                                       class="padding_10">Details</span></a>

                                 @endcan

                                 <a class="dropdown-item text-dark" href="{{route('logout')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                       class="padding_10">Logout</span></a>
                              </div>
                           </div>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                        <li>

                           @endauth
                           @guest

                        <li><a href="/login">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Login</span></a>
                        </li>
                        <li>
                           <span>/</span>
                        </li>
                        <li><a href="/register">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Register</span></a>
                        </li>
                        @endguest


                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->

   </div>
   <!-- banner bg main end -->

   <!-- Commom part -->

   <div class="container py-5 " style="margin-top: 200px;">
      @yield('main-content')
   </div>

   <!-- End Commom Part -->

   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="footer_logo"><a href="index.html"><img style="width:100px"
                  src="{{asset('home/images/logoMeh.png')}}"></a></div>
         <div class="input_bt">
            <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
            <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
         </div>
         <div class="footer_menu">
            <ul>
               <li><a href="#">Credits</a></li>
               <li><a href="#">Customer Service</a></li>
               <li><a href="{{ route('policy')}}">Policy</a></li>
               <li><a href="{{ route('terms')}}">Terms</a></li>
            </ul>
         </div>
         <div class="location_main">Email Contact : <a href="#">dragoncomponent2023@gmail.com</a></div>
         <p class="location_main">If you have any questions or issues about your order don't hesitate to contact us on our email</p>
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">© 2020 All Rights Reserved. Design by Dragon Component</p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="{{ asset('home/js/jquery.min.js') }}"></script>
   <script src="{{ asset('home/js/popper.min.js') }}"></script>
   <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('home/js/jquery-3.0.0.min.js') }}"></script>
   <script src="{{ asset('home/js/plugin.js') }}"></script>
   <!-- sidebar -->
   <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
   <script src="{{ asset('home/js/custom.js') }}"></script>
   <script>
      function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
   </script>
</body>

</html>
