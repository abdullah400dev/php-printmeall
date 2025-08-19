@extends('layouts.app2')

@section('styles')
           <title>My Orders - PrintMeAll</title>
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
       <br><br><br>
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
                    @if($order->count() > 0)
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">OrderId</th>
      <th scope="col">SubTotal</th>
      <th scope="col">Discount</th>
      <th scope="col">Tax</th>
      <th scope="col">Total</th>
      <th scope="col">First-Name</th>
      <th scope="col">Last-Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">ZipCode</th>
      <th scope="col">Status</th>
      <th scope="col">Orde Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($order as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->subtotal}}</td>
      <td>{{$item->discount}}</td>
      <td>{{$item->tax}}</td>
      <td>{{$item->total}}</td>
      <td>{{$item->firstname}}</td>
      <td>{{$item->lastname}}</td>
      <td>{{$item->mobile}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->zipcode}}</td>
      <td>{{$item->status}}</td>
      <td>{{$item->created_at}}</td>
      <td><a href="/orderdtls/{{$item->id}}"><button type="button" class="btn btn-info" style="color:white;">Details</button></a></td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any order history</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>

@endsection