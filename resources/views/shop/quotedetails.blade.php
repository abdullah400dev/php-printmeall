@extends('layouts.app2')

@section('styles')
           <title>Order Details - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<div class="cart-content">
        <div class="cart-heading">
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
            
            @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
           {{ Session::get('fail') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-lg-2"></div>
                <div class="cart-items col-lg-8 col-12">
                     <h4><center><b>Quote Details</b></center></h4>
                </div> 
        </div>
          <div class="card-body">
             <h3><center><span style="color:green">Email:</span>{{$quote->email}}</center></h3>
             <h3><center><span style="color:green">Phone:</span>{{$quote->phone}}</center></h3>
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%; background:white;">
                 <b>Inquiry Feilds: &nbsp;&nbsp;</b><br>
                 <ul>
                     @foreach(json_decode($quote->customfeilds, true) as $key => $customfeild)
                     <li><b>{{$key}}:</b> {{$customfeild}}</li>
                     @endforeach
                 </ul>
                  <b>Product ({{$quote->currency}}): &nbsp;&nbsp;</b> {{$quote->product->name}} <a href="{{url('/')}}/product/{{$quote->product_id}}" target="_blank">View Product</a><br><br>
                 <b>Message: &nbsp;&nbsp;</b><br>{!! nl2br($quote->msg) !!}
                 <br>
                 <div class="container">
                     <br>
              @if($quote->fstatus == 2)
                  <div class="alert alert-success" role="alert">
                   Response
                   </div>  
                   <p><b>Price: </b>{{$quote->price}} {{$quote->currency}}</p>
                   <p><b>Quantity: </b>{{$quote->squantity}}</p>
                   <p><b>Total Price: </b> {{$quote->squantity*$quote->price}} {{$quote->currency}}</p>
                  <p><b>Message: {{$quote->adminmsg}}</b></p>
                  <form method="post" action="{{route('addtocart')}}" enctype="multipart/form-data">
                      @csrf
                      @if($quote->image == '1')
                      <label>Upload Image/Design</label>
                      <input type="file" name="image" class="form-control" required/>
                      @endif
                  <input type="hidden" value="{{$quote->id}}" name="id" required/>
                  <div class="form-button">
                                <button type="submit" class="form-btn" style="background:#f5794e">Add To Cart</button>
                                </div>
                  </form>
                 @else
                 <div class="alert alert-warning" role="alert">
                   Your Quote Status is in Process..
                   </div>
            @endif
                     </div>
             </div>
             <br>
            </div>
    </div>
@endsection