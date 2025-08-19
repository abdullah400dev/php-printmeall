@extends('layouts.app3')

@section('content')
<link rel="stylesheet" href="{{ asset('css/account.css')}}" />
  <!-- Sidenav -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
 $(document).ready(function() {
    $('#example1').DataTable();
} );
 $(document).ready(function() {
    $('#example2').DataTable();
} );
</script>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{url('addproduct')}}" class="btn btn-sm btn-neutral">New Product</a>
              <a href="{{url('addcat')}}" class="btn btn-sm btn-neutral">New Category</a>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Shop Products</h5>
                      <span class="h2 font-weight-bold mb-0">{{$products}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"> Total Catgories</h5>
                      <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sub-Categories</h5>
                      <span class="h2 font-weight-bold mb-0">{{$subcategories}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Custom Products</h5>
                      <span class="h2 font-weight-bold mb-0">{{$cproducts}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
                @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
 {{Session::get('success')}}
</div>
@endif
    <br>
    <div class="account">
        <div class="account-top">
            <p>Your Account</p>
        </div>
        <div class="buttons">
            <div class="container-fluid">
                <div class="row">
                    <div class="button col-4">
                        <a href="{{url('/allproducts')}}">
                            <div class="inner-button">
                                <i class="fas fa-cart-plus"></i>
                                <p>Custom Products</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/allrproducts')}}">
                            <div class="inner-button">
                                <i class="fab fa-product-hunt"></i>
                                <p>Non-Custom Products</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/allorders')}}">
                            <div class="inner-button">
                                <i class="fas fa-shopping-bag"></i>
                                <p>Explore Orders</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/allrcats')}}">
                            <div class="inner-button">
                                <i class="fas fa-list"></i>
                                <p>Explore Categories</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/allrsubcats')}}">
                            <div class="inner-button">
                             <i class="fas fa-list-ol"></i>
                                <p>Sub-Categories</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/allcoupons')}}">
                            <div class="inner-button">
                                <i class="fab fa-ideal"></i>
                                <p>Explore Coupons</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/addrproduct')}}">
                            <div class="inner-button">
                                <i class="fas fa-folder-plus"></i>
                                <p>Add Product</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/addcustomproduct')}}">
                            <div class="inner-button">
                                <i class="fas fa-cart-plus"></i>
                                <p>Add Custom Product</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/addrcat')}}">
                            <div class="inner-button">
                                <i class="fas fa-plus-square"></i>
                                <p>Add Category</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-4">
                        <a href="{{url('/addrsubcat')}}">
                            <div class="inner-button">
                                <i class="fas fa-plus-square"></i>
                                <p>Add Sub Category</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('/addcoupon')}}">
                            <div class="inner-button">
                                <i class="fas fa-calendar-minus"></i>
                                <p>Add Coupon</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-4">
                        <a href="{{url('/allattributes')}}">
                            <div class="inner-button">
                                <i class="fas fa-inbox"></i>
                                <p>All Atributes</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-4">
                        <a href="{{url('getquotes?quote=requests')}}">
                            <div class="inner-button">
                                <i class="fas fa-list-alt"></i>
                                <p>All Quotes</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-4">
                        <a href="{{url('/getquotes')}}">
                            <div class="inner-button">
                                <i class="fas fa-envelope"></i>
                                <p>All Messages</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-4">
                        <a href="{{url('/admin/creditrequests')}}">
                            <div class="inner-button">
                               <i class="fas fa-mail-bulk"></i>
                                <p>Credit Requests</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-4">
                        <a href="{{url('/admin/available-vendors')}}">
                            <div class="inner-button">
                               <i class="fas fa-users"></i>
                                <p>Available Vendors</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2022 <a href="{{url('/')}}" class="font-weight-bold ml-1" target="_blank">PrintMeAll</a>
            </div>
          </div>
          <div class="col-lg-6">
          </div>
        </div>
      </footer>
    </div>
  <!-- Argon Scripts -->
@endsection
