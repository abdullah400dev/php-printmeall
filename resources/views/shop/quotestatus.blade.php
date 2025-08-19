@extends('layouts.app2')

@section('styles')
           <title>Quote Status - PrintMeAll</title>
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
        <div class="cart-heading">
            <p>My Quotes</p>
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
      <th scope="col">QuoteId</th>
      <th scope="col">Product</th>
       <th scope="col">Status</th>
      <th scope="col">Quote Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($order as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->product->name}}</td>
      @if($item->fstatus == 2)
      <td>Quoted</td>
      @else
      <td>In Process</td>
      @endif
      <td>{{$item->created_at}}</td>
      <td><a href="/qutedtls/{{$item->id}}"><button type="button" class="btn btn-info" style="color:white;">Details</button></a></td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any quotes history</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>

@endsection