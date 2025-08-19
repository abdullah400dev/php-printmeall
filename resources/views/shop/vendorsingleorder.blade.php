@extends('layouts.app2')

@section('styles')
           <title>Vendor Order - PrintMeAll</title>
            <meta name="description" content="Vendor Orders - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
 <div class="cart-content">
        <div class="cart-heading">
            <p>Single Order</p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
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
                  <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="col text-right">
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
             <?php
$product_attributes = \App\ProductAttribute::all();
?>
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
                  <td>{{ $order->transaction->mode}} @if($order->transaction->mode == 'credit') <a href="{{url('/venderordercredits')}}/{{$order->ordercredits->id}}">View Credit Details</a> @endif</td>
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
        <br>
        @if($order->status == 'ordered')
         <h3 class="mb-0"><center>Change Order Satus</center></h3><br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form action="" method="post" onsubmit="return confirm('Do you really want to change the status?');" enctype="multipart/form-data">
    @csrf
    <label><b>Change Order Status</b></label>
<select name="changeorderstatus">
    <option value="delivered">Delivered</option>
</select>
@if(auth()->user()->utype == 'DES')
<label><b>Upload Design</b></label>
<input type="file" name="file[]" required/>
@endif
<center><input type="submit" class="btn btn-primary" value="Change Status"></center>
</form>
</div>
            </div>
            @else
            <p><center><b>Order Status:</b> {{$order->status}}</center></p>
            @endif
    <br>
         <h3 class="mb-0"><center>Order Assignment</center></h3><br>
     <div class="table-responsive">

    <ul>
         <li><center><b>Your Amount: </b> {{$order->vendor_amount}}</center></li>
    </ul>
            </div>
            <br><br>
          </div>
        </div>
      </div>
      <!-- Footer -->
    </div>

    </div>

@endsection
