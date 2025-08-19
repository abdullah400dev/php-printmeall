@extends('layouts.app2')

@section('styles')
           <title>Credit Process - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
 <div class="cart-content">
     <div class="row">
         <div class="col-sm-4">
             <a href="{{url('/request-for-credit')}}"><button type="button" class="btn btn-success">Request For Credit</button></a>
         </div>
         <div class="col-sm-8">
         @if($credits) <p style="text-align:right;"><b>Remaining Credits: </b> {{$credits->amount}} {{$credits->currency}} &nbsp;</p> @endif
         </div>
     </div>
        <div class="cart-heading">
            <p>My Credit Requests</p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if($order->count() > 0)
          <table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
       <th scope="col">Status</th>
       <th scope="col">Requested Date</th>
      <th scope="col">Reason</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($order as $item)
    <tr>
      <th scope="row">{{$item->amount}} {{$item->currency}}</th>
      <td>{{$item->time}}</td>
      <td>{{status($item->status)}}</td>
      <td>{{$item->created_at->diffForHumans()}}</td>
      <td>@if($item->reason) {{$item->reason}}  @endif</td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any credits history</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
        <br><br>
          <div class="cart-heading">
            <p>Used Credits</p>
            <p></p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if($ordercredits->count() > 0)
          <table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
       <th scope="col">Status</th>
       <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($ordercredits as $item)
    <tr>
      <th scope="row">{{$item->amount}} {{$item->currency}}</th>
      <td>{{$item->time}}</td>
      <td>{{status($item->status)}}</td>
      <td>{{$item->created_at->diffForHumans()}}</td>
      <td><a href="/creditprocess/{{$item->id}}"><button type="button" class="btn btn-info" style="color:white;">Details</button></a></td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any used credits history</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>

@endsection