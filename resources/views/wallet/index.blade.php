@extends('layouts.app2')

@section('styles')
           <title>Wallet - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/account.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
 <div class="cart-content container">
     <div class="row">
         <div class="col-sm-4">
            <a href="{{url('/wallet/show')}}"><button type="button" class="btn btn-success">Update Bank Details</button></a>
         </div>
         <div class="col-sm-8">
         </div>
     </div><br>
        <div class="cart-heading">
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
             @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
           {{ Session::get('error') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if(auth()->user()->paymentrequest()->count() > 0)
          <table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Request Payment</th>
       <th scope="col">Status</th>
      <th scope="col">Requested Date</th>
      <th scope="col">Reason</th>
    </tr>
  </thead>
  <tbody>
                    @foreach(auth()->user()->paymentrequest as $item)
    <tr>
      <th scope="row">#{{$item->id}}</th>
      <td>{{$item->amount}} {{$item->currency}}</td>
      <td>{{status($item->status)}}</td>
      <td>{{$item->created_at->diffForHumans()}}</td>
      <td>@if($item->reason) {{$item->reason}}  @endif</td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any payment histroy</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
        <br><br>
          <div class="cart-heading">
            <p>Wallet Remaining Amount</p>
            <p></p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
         @if(auth()->user()->wallet)
          <table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">PKR</th>
      <th scope="col">USD</th>
       <th scope="col">UAE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>@if(auth()->user()->wallet->pkr_wallet) {{auth()->user()->wallet->pkr_wallet}} PKR @else N/A @endif</td>
      <td>@if(auth()->user()->wallet->usa_wallet){{auth()->user()->wallet->usa_wallet}} $ @else N/A @endif</td>
      <td>@if(auth()->user()->wallet->uae_wallet) {{auth()->user()->wallet->uae_wallet}} AED @else N/A @endif</td>
    </tr>
     <tr>
      <td><a href="{{url('/wallet/create?currency=pkr')}}">Withdraw PKR <i class="fa fa-coins"></i></a></td>
      <td><a href="{{url('/wallet/create?currency=usd')}}">Withdraw $ <i class="fa fa-coins"></i></a></td>
      <td><a href="{{url('/wallet/create?currency=aed')}}">Withdraw AED <i class="fa fa-coins"></i></a> </td>
    </tr>
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any amount in your wallet</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>


@endsection