@extends('layouts.app2')

@section('styles')
           <title>404 - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')

<br>
<div style="margin-top:10%;">
    <div class="quote-top"><br><br>
        <h2 class="quote-head"  style="font-weight:600; color:#115888"><center>404</center></h2>
    </div>

    <div class="container-fluid">
        <center><h4><b>Looks Like You Have Been Lost.</b></h4></center>
        <br>
        <center><a class="quote" href="https://printmeall.com/">Click Here To Explore Us</a></center>
        <br><br><br><br>
    </div>
</div>


@endsection
