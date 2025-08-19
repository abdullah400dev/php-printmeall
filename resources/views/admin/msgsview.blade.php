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
                  <h3 class="mb-0">Quote </h3>
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
             <h2><center>{{$quote->name}}</center></h2>
             <h3><center><span style="color:green">Email:</span> {{$quote->email}}</center></h3>
             <h3><center><span style="color:green">Phone:</span> {{$quote->phone}}</center></h3>
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%">
                 @if($quote->product_id != 0)
                 <b>Inquiry Feilds: &nbsp;&nbsp;</b><br>
                 <ul>
                     @foreach(json_decode($quote->customfeilds, true) as $key => $customfeild)
                     <li><b>{{$key}}:</b> {{$customfeild}}</li>
                     @endforeach
                 </ul>
                 <b>Quantity : &nbsp;&nbsp;</b>{{$quote->squantity}}<br>
                  <b>Product ({{$quote->currency}}): &nbsp;&nbsp;</b> <a href="{{url('/')}}/product/{{$quote->product_id}}" target="_blank">View Product</a><br><br>
                @endif
                 <b>Message: &nbsp;&nbsp;</b><br>{!! nl2br($quote->msg) !!}
             </div>
             <br>
         <div class="container" style="padding: 0px 95px;">
             @if($quote->product_id != 0)
              @if($quote->fstatus == 2)
                  <h2>Price Sended</h2>
                  <p><b>Send Price: {{$quote->price}}</b></p>
                  <p><b>Deisgn/Image Required: </b> @if($quote->image == 1) Yes @else No @endif</p>
                  <p><b>Send Message: @if($quote->adminmsg) {{$quote->adminmsg}} @else N/A @endif</b></p>
                 @else
                 <h2><center>Send Price</center></h2>
               <form method="post" action="{{ url('/updategetaquote')}}" >
                   @csrf
                   <input type="hidden" name="id" value="{{$quote->id}}" />
                   <input type="number" class="form-control" name="price" placeholder="Enter Price In {{$quote->currency}}" /><br>
                   <label>Deisgn/Image Required (Optional)</label>
                   <input type="checkbox" value="1" name="image" checked />
                   
                   <br>
                    <textarea name="msg" id="" cols="30" rows="3" placeholder="Your Message" class="form-control" ></textarea>
                               <br>
                                <div class="form-button">
                                  <center> <button type="submit" class="btn btn-success">Send</button></center> 
                                </div>
                      </form>
              @endif
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
