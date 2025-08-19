@extends('layouts.app2')

@section('styles')
           <title>Credit Details - PrintMeAll</title>
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
                     <h4><center><b>Credit Details</b></center></h4>
                </div>
        </div>
          <div class="card-body">
             <div style="width:80%; margin:auto; border:2px solid black; padding:3%; background:white;">
                 <ul>
                     <li><b>Amount:</b> {{$quote->amount}} {{$quote->currency}}</li>
                     <li><b>Time:</b> {{$quote->time}} Days</li>
                     <li><b>Status:</b> {{status($quote->status)}}</li>
                     <li><b>DeadLine:</b> @if($quote->deadline) {{$quote->deadline}} @else N/A @endif</li>
                      @if($quote->document)
                      <li><b>GRN:</b> <a href="{{url('/')}}/public/documents/{{$quote->document}}" target="_blank">View GRN</a></li>
                      @endif
                 </ul>
                 <div class="container">
                     <br>
              @if($quote->status == 5 || $quote->status == 2)
                  <div class="alert alert-success" role="alert">
                   Send Payment & Upload Payment Proof to get your credit back
                   </div>
                  <form method="post" action="{{route('updatepaymentproof')}}" enctype="multipart/form-data">
                      @csrf
                      @if($quote->image == '1')
                      <label>Upload Image/Design</label>
                      <input type="file" name="image" class="form-control" required/>
                      @endif
                  <input type="hidden" value="{{$quote->id}}" name="id" required/>
                  <label><b>Upload Payment Proof</b></label>
                  <input type="file" class="form-control" name="file" required/>
                  <div class="form-button">
                                <button type="submit" class="form-btn" style="background:#f5794e; width:50%">Upload Payment Proof</button>
                                </div>
                  </form>
                 @else
            @endif
                     </div>
             </div>
             <br>
            </div>
    </div>
@endsection
