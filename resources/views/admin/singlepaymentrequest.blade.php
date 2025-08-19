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
                  <h3 class="mb-0">Update Request Payment Status </h3>
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
              <form action="{{ url('updaterpaymentrequest') }}" method="POST">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Update Payment Request</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">User name</label>
                           <input type="hidden" id="input-ids" class="form-control" name="id" placeholder="ID" value="{{$request->id}}">
                        <input type="text" id="input-username" class="form-control" name="productname" placeholder="User name" value="{{$request->user->name}}" required readonly>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Status</label>
                        <select  class="form-control" name="status">
                            @foreach(status()  as $key => $value)
                            <option value="{{$key}}" @if($key == $request->status) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Reason</label>
                       <textarea class="form-control" name="reason"></textarea>
                      </div>
                    </div>

                  </div>
               <center><button class="btn btn-sm btn-lg btn-primary">Update Payment Request</button></center> 
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