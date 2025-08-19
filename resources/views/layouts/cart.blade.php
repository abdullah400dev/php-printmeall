@extends('layouts.app2')

@section('styles')
 @livewireStyles          
<title>Cart - Print Me All</title>
<meta name="description" content="Cart Description">
<link rel="stylesheet" href="{{ asset('css/rproduct.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
<meta name="robots" content="noindex, nofollow">

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

    
@livewire('cart-component')

<br>


    @livewireScripts 
    @endsection