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
                  <h3 class="mb-0">Credit Request </h3>
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
             <h2><center>{{$quote->user->name}}</center></h2>
             <h3><center><span style="color:green">Email:</span>{{$quote->user->email}}</center></h3>
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%">
                 <b>Documents: &nbsp;&nbsp;</b><br>
                 <ul>
                     @foreach(json_decode($quote->documents, true) as $key => $customfeild)
                     <li><a href="{{url('/')}}/public/documents/{{$customfeild}}" target="_blank"> {{$customfeild}} </a></li>
                     @endforeach
                 </ul>
                 <b>Amount : &nbsp;&nbsp;</b>{{$quote->amount}}<br>
                 <b>Time : &nbsp;&nbsp;</b>{{$quote->time}} Days<br>
                 <b>Status : &nbsp;&nbsp;</b>{{status($quote->status)}}<br>

             </div>
             <br>
         <div class="container" style="padding: 0px 95px;">
              @if($quote->status == 2 || $quote->status == 3)
                 @else
                 <h2><center>Update Credit Request Status</center></h2>
               <form method="post" action="{{ url('/updatecreditviewstatus')}}" onsubmit="return confirm('Are you sure you want to update status?');">
                   @csrf
                   <input type="hidden" name="id" value="{{$quote->id}}" />
                  <select name="status" class="form-control" required>
                      <option value="">Change Stats Please</option>
                       <option value="1">Under Review</option>
                       <option value="2">Rejected</option>
                       <option value="3">Approved</option>
                  </select>
                  <br>
                    <textarea name="reason" id="" cols="30" rows="3" placeholder="Your Message" class="form-control" required></textarea>
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
