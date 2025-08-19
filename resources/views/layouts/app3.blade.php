<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PrintMeAll Admin</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{url('/')}}/images1/logo2.png" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
      <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('admin/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/argon.css?v=1.2.0 ') }}" type="text/css">
     <script src='https://cdn.tiny.cloud/1/2bnu48x9mf7fs7gl43fk94vqvhg88wfp0s28op9a4rce3g1r/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <style>
  b, strong {
   font-weight:bold;   
  }
      .page-link{
          border:none;
      }
      .previous {
          margin-right: 5%;
      }
  </style>
   
</head>
<body >
     <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{url('/')}}/images1/logo2.png" class="navbar-brand-img') }}" alt="..."> <b>Admin</b>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('/home') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addcustomproduct')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Custom Product</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('allproducts')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Custom Products</span>
              </a>
            </li>
          </ul> 
          <!-- Divider -->
        <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Shop</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('allrcats')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addrcat')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Category</span>
              </a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="{{url('allrsubcats')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Sub Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addrsubcat')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add SubCategory</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('allrproducts')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Products</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('addrproduct')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Products</span>
              </a>
            </li>
          </ul>
          
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Attributes</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
           <li class="nav-item">
              <a class="nav-link" href="{{url('allattributes')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Attribute</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('addattribute')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Attribute</span>
              </a>
            </li>
          </ul>
              <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Coupons</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
           <li class="nav-item">
              <a class="nav-link" href="{{url('allcoupons')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Coupons</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('addcoupon')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Coupon</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Orders</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('allorders')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Orders</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
           <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Charges</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
              <a class="nav-link" href="{{url('addcharges')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Charges</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('allcharges')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Charges</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
          <!-- Heading -->
            <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Gigs</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
              <a class="nav-link" href="{{url('addgigcharges')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">Add Gig Charges</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/gigcharges')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Gig Charges</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/designers')}}">
                <i class="fa fa-plus text-yellow" aria-hidden="true"></i>
                <span class="nav-link-text">All Designers</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Quotes</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('getquotes?quote=requests')}}">
                <i class="fa fa-list-alt " aria-hidden="true"></i>
                <span class="nav-link-text">All Quotes</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
          <!-- Heading -->
            <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Payments Request</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/paymentrequests')}}">
                <i class="fa fa-list-alt " aria-hidden="true"></i>
                <span class="nav-link-text">All Payments Request</span>
              </a>
            </li>
          </ul>
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Messages</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('getquotes')}}">
                <i class="fa fa-list-alt " aria-hidden="true"></i>
                <span class="nav-link-text">All Messages</span>
              </a>
            </li>
          </ul>
           <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/creditrequests')}}">
                <i class="fa fa-list-alt " aria-hidden="true"></i>
                <span class="nav-link-text">Credit Requests</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/ordercredits')}}">
                <i class="fa fa-list-alt " aria-hidden="true"></i>
                <span class="nav-link-text">Credits Used</span>
              </a>
            </li>
          </ul>
           <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/admin/available-vendors')}}">
                <i class="fa fa-users " aria-hidden="true"></i>
                <span class="nav-link-text">Available Vendors</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form 
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>-->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i> 
                @if($quotescountunread > 0)
                <span class="badge badge-success">new</span>
                @endif
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{$quotescountunread}}</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                    @foreach($globquotes as $globquote)
                  <a href="{{url('msgs')}}/{{$globquote->id}}" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{url('/')}}/images1/userprint.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">{{$globquote->name}}</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>{{$globquote->created_at}}</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">{{substr($globquote->msg, 0,  50)}}.</p>
                      </div>
                    </div>
                  </a>
                  @endforeach
                </div>
                <!-- View all -->
                <a href="{{ url('changestatus') }}" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="{{url('addproduct')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Product</small>
                  </a>
                  <a href="{{url('addcat')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Category</small>
                  </a>
                  <a href="{{url('addsubcat')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>SubCategory</small>
                  </a>
                  <a href="{{url('allproducts')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>All&nbsp;Products</small>
                  </a>
                  <a href="{{url('allcats')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>All&nbsp;Categories</small>
                  </a>
                  <a href="{{url('allsubcats')}}" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>All&nbsp;SubCategrs</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{url('/')}}/images1/admin.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Taha Khan</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
            @yield('content')
  </div>


        <main class="py-4">

        </main>
    </div>
    

      <!-- Core 
  <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js')}}"></script>-->
  <script src="{{ asset('admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('admin/assets/js/argon.js?v=1.2.0')}}"></script>
  
</body>
</html>
