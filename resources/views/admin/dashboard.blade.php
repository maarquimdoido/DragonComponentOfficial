@extends('admin.layouts.template')
@section('page_title')
Dashboard - Dragon Component
@endsection
@section('content')

@php
$lucroPorcentagem = 100-30; //porcentagem baseado em quanto gastamos e em quanto ganhamos

@endphp

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
          <span class="app-brand-logo demo">
            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <path
                  d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                  id="path-1"></path>
                <path
                  d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                  id="path-3"></path>
                <path
                  d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                  id="path-4"></path>
                <path
                  d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                  id="path-5"></path>
              </defs>
              <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                  <g id="Icon" transform="translate(27.000000, 15.000000)">
                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                      <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                      </mask>
                      <use fill="#696cff" xlink:href="#path-1"></use>
                      <g id="Path-3" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-3"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                      </g>
                      <g id="Path-4" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-4"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                      </g>
                    </g>
                    <g id="Triangle"
                      transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                      <use fill="#696cff" xlink:href="#path-5"></use>
                      <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </span>
          <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
        </a>
        <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
              <div class="app-brand demo">
                <a href="/admin/dashboard" class="app-brand-link">

                  <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Painel</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                  <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
              </div>

              <div class="menu-inner-shadow"></div>

              <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                  <a href="{{route('admindashboard')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                  </a>
                </li>

                <!-- Layouts -->

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Category</span>
                </li>

                <li class="menu-item ">
                  <a href="{{route('addcategory')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Add Category</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('allcategory')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">All Category</div>
                  </a>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Sub Category</span>
                </li>

                <li class="menu-item ">
                  <a href="{{route('addsubcategory')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Add Sub Category</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('allsubcategory')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">All Sub Category</div>
                  </a>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Product</span>
                </li>

                <li class="menu-item ">
                  <a href="{{route('addproduct')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Add Product</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('allproducts')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">All Products</div>
                  </a>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Orders</span>
                </li>

                <li class="menu-item ">
                  <a href="{{route('completedorder')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Confirmed Orders</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('pendingorder')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Pending Orders</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('canceledorder')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Canceled Orders</div>
                  </a>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">User</span>
                </li>

                <li class="menu-item ">
                  <a href="{{route('users')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">All Users</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('usersVerified')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Verified Users</div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="{{route('usersUnverified')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Unverified Users</div>
                  </a>
                </li>
              </ul>
            </aside>
            <!-- / Menu -->

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Extended UI</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="extended-ui-text-divider.html" class="menu-link">
                    <div data-i18n="Text Divider">Text Divider</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Boxicons</div>
              </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Form Elements</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
            </ul>
    </aside>
    <!-- / Menu -->

    <div class="layout-page">
      <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">

            <div class="col-lg-8 mb-4 order-0">
              <div class="card">
                <div class="d-flex align-items-end row">
                  <div class="col-sm-7">
                    <div class="card-body">
                      <h5 class="card-title text-primary">Hello {{Auth::user()->name}}! 🎉</h5>
                      <p class="mb-4">
                        Check some of our <span class="fw-bold">features</span> beside.
                      </p>

                    </div>
                  </div>
                  <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                      <img src="{{asset('home/images/manlaptop.png')}}" height="140" alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 order-1">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">

                        <div class="avatar flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stairs-up"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 20h4v-4h4v-4h4v-4h4" />
                            <path d="M4 11l7 -7v4m-4 -4h4" />
                          </svg>

                        </div>

                      </div>
                      <span class="fw-semibold d-block mb-1">Lucro <small class="text-success fw-semibold"><i
                            class="bx bx-up-arrow-alt"></i> + {{ $lucroPorcentagem
                          }}%</small></span>
                      <h3 class="card-title mb-2"> {{ $lucro }} € </h3>

                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="rounded" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                          </svg>
                        </div>
                        <div class="dropdown">
                          <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="{{ route('users') }}">Ver todos Usuarios</a>
                            <a class="dropdown-item" href="{{ route('usersVerified') }}">Ver Usuarios Verificados</a>
                            <a class="dropdown-item" href="{{ route('usersUnverified') }}">Ver Usuarios Não
                              Verificados</a>
                          </div>
                        </div>
                      </div>
                      <span>Usuarios</span>
                      <h3 class="card-title text-nowrap mb-1">{{ $totalUsuarios }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
              <div class="row">
                <div class="col-6 mb-4">

                  

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">

                        <div class="avatar flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stairs-up"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 20h4v-4h4v-4h4v-4h4" />
                            <path d="M4 11l7 -7v4m-4 -4h4" />
                          </svg>

                        </div>

                      </div>
                      <span class="fw-semibold d-block mb-1">Lucro <small class="text-success fw-semibold"><i
                            class="bx bx-up-arrow-alt"></i> + {{ $lucroPorcentagem
                          }}%</small></span>
                      <h3 class="card-title mb-2"> {{ $lucro }} € </h3>

                    </div>
                  </div>

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-paypal" viewBox="0 0 16 16">
                            <path
                              d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                          </svg>
                        </div>
                        <div class="dropdown">
                          <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span class="d-block mb-1">Pagamento</span>
                      <h3 class="card-title text-nowrap mb-2">{{ $pagamentos }} €</h3>
                    </div>
                  </div>
                </div>

                <div class="col-6 mb-4">

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="rounded" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                          </svg>
                        </div>
                        
                        <div class="dropdown">
                          <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="{{ route('users') }}">Ver todos Usuarios</a>
                            <a class="dropdown-item" href="{{ route('usersVerified') }}">Ver Usuarios Verificados</a>
                            <a class="dropdown-item" href="{{ route('usersUnverified') }}">Ver Usuarios Não
                              Verificados</a>
                          </div>
                        </div>
                      </div>
                      <span>Usuarios</span>
                      <h3 class="card-title text-nowrap mb-1">{{ $totalUsuarios }}</h3>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">

                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-paypal" viewBox="0 0 16 16">
                            <path
                              d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                          </svg>
                        </div>

                      </div>
                      <span class="fw-semibold d-block mb-1">Transactions</span>
                      <h3 class="card-title mb-2">{{ $compras }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
              <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                  <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Estatisticas de venda</h5>
                    <small class="text-muted"> {{ $compras }} total de compras </small>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column align-items-center gap-1">
                      <h2 class="mb-2"> {{ $pagamentos }}€ </h2>
                      <span>Total de compras</span>
                    </div>
                  </div>
                  <ul class="p-0 m-0">

                    @foreach($categories as $categorie)
                    @php


                    @endphp
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded"></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0"> {{ $categorie->category_name }} </h6>
                          <small class="text-muted"> {{ $categorie->category_name }} </small>
                        </div>
                      </div>
                    </li>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <!--/ Order Statistics -->

            <!-- Expense Overview -->

            <!--/ Expense Overview -->

            <!-- Transactions -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
              <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-title m-0 me-2">Pedidos</h5>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                      <a class="dropdown-item" href="{{route('completedorder')}}">Confirmed orders</a>
                      <a class="dropdown-item" href="{{route('canceledorder')}}">Canceled Order</a>
                      <a class="dropdown-item" href="{{route('pendingorder')}}">Pending Order</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="p-0 m-0">
                    @php
                    $index = 0
                    @endphp

                    @foreach($orders as $order)
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="{{asset('home/images/paypal.png')}}" alt="User" class="rounded" />
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <small class="text-muted d-block mb-1">Paypal</small>
                          <h6 class="mb-0">{{$order->status}}</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">@if( $order->status == 'canceled') - @else + @endif {{$order->total_price}}
                          </h6>
                          <span class="text-muted">EUR</span>
                        </div>
                      </div>
                    </li>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <!--/ Transactions -->
          </div>
        </div>
        <!-- / Content -->



        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection