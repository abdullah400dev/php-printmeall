@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->
  
<style>
    .form-control{
        border: 1px solid;
    }
</style>
   <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-color: #5e72e4 !important; background-size: cover; background-position: center top; padding-top:10%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add New Coupon </h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="{{url('allcoupons')}}" class="btn btn-sm btn-primary">All Coupons</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('addcouponquery') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Coupons Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Coupon Code</label>
                        <input type="text" id="input-username" class="form-control" name="coupon-code" placeholder="Coupon Code" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Coupon Type</label>
                        <select class="form-control" name="coupon-type">
                            <option value="">Select</option>
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Coupon Value</label>
                        <input type="text" id="input-username" class="form-control" name="coupon-value" placeholder="Coupon Value" required>
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Cart Value</label>
                        <input type="text" id="input-username" class="form-control" name="cart-value" placeholder="Cart Value" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Expiry Date</label>
                        <input type="date" id="input-username" value="" class="form-control" name="expire" placeholder="Expiry Date" required>
                      </div>
                    </div>
                  </div>
               <center><button class="btn btn-sm btn-lg btn-primary">Add New Coupon</button></center> 
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>
  </div>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
  <!-- Argon Scripts -->
    <!-- Argon Scripts -->
@endsection