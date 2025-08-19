@extends('layouts.app2')

@section('styles')
           <title>Contact Us</title>
            <meta name="description" content="All Contact Us Description goes Here.">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')


<div class="quote1">
    <div class="quote-top"><br><br>
        <h2 class="quote-head"><center>Get A Quote</center></h2>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="quote-detail-col">
                <div class="quote-detail" style="text-align:center">
                    <p><strong>Don't see what you are looking for?</strong> Don't worry, we have you covered!</p>
                    <p>We offer a wide range of solutions bound to meet your requirements.</p>
                    <p>Tell us little about your requirements and let us design a Free Custom Design Mockup for Your
                        product packaging.</p>
                </div>
            </div>
            <div class="quote-fom-col" style="width:60%; margin:auto; margin-top:5%">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif
                <form method="post" action="{{ url('/getaquote1')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                             <input type="text"  name="fname" placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                             <input type="text"  name="lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <input type="tel"  name="phone"  id="" placeholder="Phone Number" required>
                    <input type="email" name="email" id="" placeholder="Email" required>
                                        <select name="quotecat" class="quoteselect" required>
                        <option value="">Select A Type*</option>
                         @foreach( $globalcats as $product )
                         <option value="{{$product->id}}">{{$product->name}}</option>
                         @endforeach
                    </select>
                    <textarea name="msg" id="" cols="30" rows="3" placeholder="Your Message" required></textarea>
                    <div class="button">
                        <button class="form-btn">Send</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
