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
                  <h3 class="mb-0">Add Gig Charges</h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('addgigcharges') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to add new charges?');">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Add Gig Charges</h6>
                <div class="pl-lg-4">
                  <div class="">
                <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Gig Category</label>
                        <select class="form-control" name="category" required>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Junior Rate (PKR)</label>
                        <input type="number" id="input-username" class="form-control" name="junior_rate_pkr" placeholder="Expert Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                       <div class="form-group">
                        <label class="form-control-label" for="input-username">Junior Rate (UAE)</label>
                        <input type="number" id="input-username" class="form-control" name="junior_rate_uae" placeholder="Expert Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Junior Rate (USD)</label>
                        <input type="number" id="input-username" class="form-control" name="junior_rate_usd" placeholder="Expert Rate" required>
                      </div>
                      </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Medium Rate (PKR)</label>
                        <input type="number" id="input-username" class="form-control" name="medium_rate_pkr" placeholder="Medium Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                       <div class="form-group">
                        <label class="form-control-label" for="input-username">Medium Rate (UAE)</label>
                        <input type="number" id="input-username" class="form-control" name="medium_rate_uae" placeholder="Medium Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Medium Rate (USD)</label>
                        <input type="number" id="input-username" class="form-control" name="medium_rate_usd" placeholder="Medium Rate" required>
                      </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Expert Rate (PKR)</label>
                        <input type="number" id="input-username" class="form-control" name="exp_rate_pkr" placeholder="Expert Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                       <div class="form-group">
                        <label class="form-control-label" for="input-username">Expert Rate (UAE)</label>
                        <input type="number" id="input-username" class="form-control" name="exp_rate_uae" placeholder="Expert Rate" required>
                      </div>
                      </div>
                       <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Expert Rate (USD)</label>
                        <input type="number" id="input-username" class="form-control" name="exp_rate_usd" placeholder="Expert Rate" required>
                      </div>
                      </div>
                    </div>

                  </div>
               <center><button class="btn btn-sm btn-lg btn-primary">Add New Gig Charge</button></center> 
              </form>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  <!-- Argon Scripts -->
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
@endsection