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
              <form action="{{ url('addcatquery') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Coupons Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Coupon Code</label>
                        <input type="text" id="input-username" class="form-control" name="Coupon Code" placeholder="productname" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Coupon Type</label>
                        <select class="form-control">
                            <option value="">Select</option>
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Coupon Value</label>
                        <input type="text" id="input-username" class="form-control" name="Coupon-Value" placeholder="Coupon Value" required>
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Cart Value</label>
                        <input type="text" id="input-username" class="form-control" name="Cart-Value" placeholder="Cart Value" required>
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