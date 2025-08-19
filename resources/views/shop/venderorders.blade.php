@extends('layouts.app2')

@section('styles')
           <title>Vendor Orders - PrintMeAll</title>
            <meta name="description" content="Vendor Orders - PrintMeAll">
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
         </div>
     </div>
        <div class="cart-heading">
            <p>My Orders</p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if($orders->count() > 0)
          <table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Customer Name</th>
       <th scope="col">Amount</th>
       <th scope="col">Created Date</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($orders as $item)
    <tr>
      <th scope="row">{{$item->total}} {{$item->currency}}</th>
      <td>{{$item->firstname}} {{$item->lastname}}</td>
      <td>{{$item->vendor_amount}} {{$item->currency}}</td>
      <td>{{$item->created_at->diffForHumans()}}</td>
      <td><a href="{{url('vendorsingleorder/')}}/{{$item->id}}"><i class="fas fa-eye"></i></a></td>
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
    </div>

@endsection