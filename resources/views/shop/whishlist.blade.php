@extends('layouts.app2')

@section('styles')
           <title>Wishlist - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
   @livewireStyles  
@livewire('wishlist-component')
  @livewireScripts 
@endsection