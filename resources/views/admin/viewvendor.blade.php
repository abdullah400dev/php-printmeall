@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->
  
<style>
    .form-control{
        border: 1px solid;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-color: #5e72e4 !important; background-size: cover; background-position: center top; padding-top:10%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Vendor </h3>
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
             <center><img  src="{{url('/')}}/images1/userprint.jpg" class="avatar rounded-circle" /></center>
             <h2><center>{{$users->name}}</center></h2>
             <h3><center><span style="color:green">Email:</span>{{$users->email}}</center></h3>
             <h3><center><span style="color:green">Phone:</span>@if($users->vendordata){{$users->vendordata->phonenum}} @else N/A @endif</center></h3>
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%">
                  <b>Bank Details: &nbsp;&nbsp;</b><br>
                 <ul>
                     <li> <b>Bank Name:</b> {{$users->vendordata->bank_name}}</li>
                     <li> <b>Account Holder Name:</b> {{$users->vendordata->account_holdername}}</li>
                     <li> <b>Account Number:</b> {{$users->vendordata->account_num}}</li>
                 </ul>
                  <b>Product Types Details: &nbsp;&nbsp;</b><br>
                 <ul>
                     @foreach(json_decode($users->vendordata->product_types) as $value)
                     <li>{{$value}}</li>
                     @endforeach
                 </ul>
                 <b>Machine Types Details: &nbsp;&nbsp;</b><br>
                 <ul>
                     @foreach(json_decode($users->vendordata->machines_types) as $value)
                     <li>{{$value}}</li>
                     @endforeach
                 </ul>
                 
             </div>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  <!-- Argon Scripts -->
    <!-- Argon Scripts -->
@endsection