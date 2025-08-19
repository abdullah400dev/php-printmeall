@extends('layouts.app3')

@section('content')
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
<style>

</style>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
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
      <div class="row">
        <div class="col-xl-12">
          <div class="card" style="border:2px solid black;">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Orders Details</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Orders Details</a>
                </div>
              </div>
            </div>
            <div class="container">
            <h3 class="mb-0"><center>Orders Items</center></h3>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $quote)
            <tr>
                 <td><img src="https://printmeall.com/laravel/storage/app/images/{{$quote->rproduct->image}}" width="50px" height="50px" /></td>
                  <td>{{ $quote->rproduct->name}}</td>
                  <td>@if($quote->options)
                  @foreach(unserialize($quote->options) as $key=> $value)
                  @if($key=='image')
                  <p><strong>{{$key}}</strong>: <img src="{{url('/')}}/storage/app/images/{{$value}}" style="height:60px; width: 60px"/>&nbsp;<a href="{{url('/')}}/storage/app/images/{{$value}}" target="blank"><i class="fas fa-eye"></i></a></p>
                  @else
                  @if(isset($product_attributes->where('id', $key)->first()->name))
                                            <p><strong>{{$product_attributes->where('id', $key)->first()->name}}:</strong> &nbsp;{{$value}}</p>
                                              @else
                                              <p><strong>{{$key}}:</strong> &nbsp;{{$value}}</p>
                                            @endif
                  @endif
                  @endforeach
                  @endif
                  </td>
                  <td>{{ $quote->price}}</td>
                  <td>{{ $quote->quantity}}</td>
                  <td>{{$quote->price * $quote->quantity}} {{$order->currency}}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
             <tr>
                 <th>Order Id</th>
            </tr>
        </tfoot>
    </table>
    <!------ Order Summary ----->
    <br><br>
     <h3 class="mb-0"><center>Orders Details</center></h3><br>
     <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Subtotal</th>
                <th>Tax</th>
                <th>Shipping</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                  <td>{{ $order->subtotal}}</td>
                  <td>{{ $order->tax}}</td>
                  <td>Free Shipping</td>
                  <td>{{ $order->total}} {{$order->currency}}</td>
            </tr>
        </tbody>
        <tfoot>
             <tr>
                <th>Subtotal</th>
                <th>Tax</th>
                <th>Shipping</th>
                <th>Total</th>
            </tr>
        </tfoot>
    </table>
            </div>
               <br><br>
               <h3 class="mb-0"><center>Orders Status</center></h3><br>
     <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Status</th>
                @if( $order->status=='delivered')
                <th>Delieverd Date</th>
                @elseif($order->status=='cancelled')
                <th>Cancelled Date</th>
                @else
                <th>Ordered Date</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                  <td>{{ $order->status}}</td>
                   @if($order->status=='delivered')
                <th>{{ $order->delivered_date}}</th>
                @elseif($order->status=='cancelled')
                <th>{{ $order->cancelled_date}}</th>
                @else
                <th>{{ $order->created_at}}</th>
                @endif
            </tr>
        </tbody>
        <tfoot>
              <tr>
                <th>Status</th>
                @if( $order->status=='delivered')
                <th>Delieverd Date</th>
                @elseif($order->status=='cancelled')
                <th>Cancelled Date</th>
                @else
                <th>Ordered Date</th>
                @endif
            </tr>
        </tfoot>
    </table>
            </div>
               <br><br>
     <h3 class="mb-0"><center>Billing Details</center></h3><br>
     <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr> <th colspan="2"> Billing Details</th> </tr>
        </thead>
        <tbody>
            <tr>
                 <th>First Name</th>
                  <td>{{ $order->firstname}}</td>
                  </tr>
                  <tr>
                    <th>Last Name</th>
                    <td>{{ $order->lastname}}</td>
                  </tr>
                  <tr>
                      <th>Phone</th>
                      <td>{{ $order->mobile}}</td>
                  </tr>
                  <tr>
                       <th>Email</th>
                       <td>{{ $order->email}}</td>
                  </tr>
                  <tr>
                     <th>Address 1</th>
                     <td>{{ $order->line1}}</td>
                  </tr>
                  <tr>
                    <th>Address 2</th>
                    <td>{{ $order->line2}}</td>
                  </tr>
                  <tr>
                      <th>City</th>
                      <td>{{ $order->city}}</td>
                  </tr>
                  <tr>
                  <th>State</th>
                  <td>{{ $order->province}}</td>
                  </tr>
                 <tr>
                     <th>Country</th>
                     <td>{{ $order->country}}</td>
                 </tr>
                  <tr>
                        <th>Zip Code</th>
                        <td>{{ $order->zipcode}}</td>
                  </tr>

            </tr>
        </tbody>
    </table>
            </div>
                           <br><br>
                           @if($order->is_shipping_different)
     <h3 class="mb-0"><center>Shipping Details</center></h3><br>
     <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr> <th colspan="2"> Shipping Details</th> </tr>
        </thead>
        <tbody>
            <tr>
                 <th>First Name</th>
                  <td>{{ $order->shipping->firstname}}</td>
                  </tr>
                  <tr>
                    <th>Last Name</th>
                    <td>{{ $order->shipping->lastname}}</td>
                  </tr>
                  <tr>
                      <th>Phone</th>
                      <td>{{ $order->shipping->mobile}}</td>
                  </tr>
                  <tr>
                       <th>Email</th>
                       <td>{{ $order->shipping->email}}</td>
                  </tr>
                  <tr>
                     <th>Address 1</th>
                     <td>{{ $order->shipping->line1}}</td>
                  </tr>
                  <tr>
                    <th>Address 2</th>
                    <td>{{ $order->shipping->line2}}</td>
                  </tr>
                  <tr>
                      <th>City</th>
                      <td>{{ $order->shipping->city}}</td>
                  </tr>
                  <tr>
                  <th>State</th>
                  <td>{{ $order->shipping->province}}</td>
                  </tr>
                 <tr>
                     <th>Country</th>
                     <td>{{ $order->shipping->country}}</td>
                 </tr>
                  <tr>
                        <th>Zip Code</th>
                        <td>{{ $order->shipping->zipcode}}</td>
                  </tr>

            </tr>
        </tbody>
    </table>
            </div>
            <br><br>
            @endif
              <h3 class="mb-0"><center>Transaction Details</center></h3><br>
     <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr> <th colspan="2"> Transaction Details</th> </tr>
        </thead>
        <tbody>
            <tr>
                 <th>Transaction Mode</th>
                  <td>{{ $order->transaction->mode}} @if($order->transaction->mode == 'credit') <a href="{{url('/ordercredits')}}/{{$order->ordercredits->id}}">View Credit Details</a> @endif</td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>{{ $order->transaction->status}} </td>
                  </tr>
                  <tr>
                      <th>Created Date</th>
                      <td>{{ $order->transaction->created_at}}</td>
                  </tr>

            </tr>
        </tbody>
    </table>
    @if($order->status != 'delivered')
    <br>
         <h3 class="mb-0"><center>Order Assignment</center></h3><br>
     <div class="table-responsive">
                 @if($order->vendor == NULL)
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr> <th colspan="2"> Order Assignment</th> </tr>
        </thead>
        <tbody>
            <form action="{{url('assgnvndr')}}" method="POST">
                @csrf
            <tr>
                 <th> Select vendor</th>
                  <td>
                      <input type="hidden" name="orderid" value="{{$order->id}}" />
                      <select name="vendor" class="form-control" required>
                          <option value="">Select A Vendor</option>
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                           @endforeach
                      </select>
                  </td>
                  </tr>
                  <tr>
                    <th>Amount</th>
                    <td><input type="number" name="amount" class="form-control" required /> </td>
                  </tr>
                  <tr>
                      <th><input type="submit" value="Choose Vendor" class="btn btn-sm btn-primary" /></th>
                  </tr>

            </tr>
            </form>
        </tbody>
    </table>
    @else
    <ul>
        <li><b> Vendor Name</b> {{$order->vendororder->name}}</li>
         <li><b> Amount</b> {{$order->vendor_amount}}</li>
    </ul>
    @endif

    @endif
            </div>
            <br><br>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">

            </ul>
          </div>
        </div>
      </footer>
    </div>
  <!-- Argon Scripts -->
@endsection
