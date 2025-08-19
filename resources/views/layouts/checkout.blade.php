@extends('layouts.app2')

@section('styles')
 @livewireStyles          
<title>CheckOut - Print Me All</title>
<meta name="description" content="CheckOut Description">
<link rel="stylesheet" href="{{ asset('css/styles1.css')}}" />
<link rel="stylesheet" href="{{ asset('css/checkout.css')}}" />
<meta name="robots" content="noindex, nofollow">
<style>
    .invalid-feedback{
        display:block !important;
    }
</style>
@stop
@section('scripts')
  <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="{{asset('js/product.js')}}"></script>
  <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@stop
@section('content')

    <!-- end navbar -->
@livewireStyles
</head>
    <!-- end navbar -->
@livewire('checkout-component')

<br>


    @livewireScripts 
    @endsection
