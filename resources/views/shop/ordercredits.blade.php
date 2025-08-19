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
                  <h3 class="mb-0">Order Credit</h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
             <center><img  src="https://printmeall.com/images1/userprint.jpg" class="avatar rounded-circle" /></center>
             <h2><center>{{$quote->user->name}}</center></h2>
             <h3><center><span style="color:green">Email:</span>{{$quote->user->email}}</center></h3>
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%">
                 <ul>
                     <li><b>Amount:</b> {{$quote->amount}}</li>
                      <li><b>Time:</b> {{$quote->time}} Days</li>
                       <li><b>Status:</b> {{status($quote->status)}}</li>
                        <li><b>Deadline:</b> @if($quote->deadline) {{$quote->deadline}} @else N/A @endif</li>
                         @if($quote->document)
                      <li><b>GRN:</b> <a href="{{url('/')}}/public/documents/{{$quote->document}}" target="_blank">View GRN</a></li>
                      @endif
                 </ul>
             </div>
             <br>
             <div class="container" style="padding: 0px 95px;">
              @if($quote->status == 5)

              @elseif($quote->status == 6)
              <h2><center>Update Payment Proof</center></h2>
               <form method="post" action="{{ url('/updatepaymentproofstatus')}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to update status?');">
                   @csrf
                   <input type="hidden" name="id" value="{{$quote->id}}" />
                   <label><b>Payment Proof Document </b><a href="{{url('/')}}/public/documents/{{$quote->proof}}" target="_blank">View Document</a></label>
                   <br>
                    <label><b>Change Status*</b></label>
                 <select name="status" class="form-control" required>
                      <option value="">Change Stats Please</option>
                       <option value="2">Rejected</option>
                       <option value="3">Approved</option>
                  </select>                               <br>
                                <div class="form-button">
                                  <center> <button type="submit" class="btn btn-success">Send</button></center>
                                </div>
                      </form>
                 @else
                 <h2><center>Update Status</center></h2>
               <form method="post" action="{{ url('/updateordercreditstatus')}}" enctype="multipart/form-data" >
                   @csrf
                   <input type="hidden" name="id" value="{{$quote->id}}" />
                   <label><b>Goods Has Been Delivered *</b></label>
                   <input type="checkbox" value="1" name="image" checked required/>
                   <br>
                    <label><b>Upload GRN (Goods Receiving Notice) *</b></label>
                   <input type="file" class="form-control" name="file" required/><br>
                               <br>
                                <div class="form-button">
                                  <center> <button type="submit" class="btn btn-success">Send</button></center>
                                </div>
                      </form>
              @endif
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
