@extends('layouts.app2')

@section('styles')
           <title>Dashboard - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/account.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br>
    <div class="account">
        <div class="account-top">
            <p>Your Account</p>
        </div>
        <div class="buttons">
            <div class="container-fluid">
                <div class="row">
                    <div class="button col-3">
                        <a href="{{url('/cart')}}">
                            <div class="inner-button">
                                <i class="fas fa-cart-plus"></i>
                                <p>Cart</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-3">
                        <a href="{{url('/wishlist')}}">
                            <div class="inner-button">
                                <i class="fas fa-heart"></i>
                                <p>Wishlist</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-3">
                        <a href="{{url('/orders')}}">
                            <div class="inner-button">
                                <i class="fas fa-shopping-bag"></i>
                                <p>Order history</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-3">
                        <a href="{{url('/venderorders')}}">
                            <div class="inner-button">
                                <i class="fas fa-coins"></i>
                                <p>Your Orders</p>
                            </div>
                        </a>
                    </div>
                     <div class="button col-3">
                        <a href="{{url('/venderorders')}}">
                            <div class="inner-button">
                                <i class="fas fa-user"></i>
                                <p>Your Profile</p>
                            </div>
                        </a>
                    </div>
                    <div class="button col-3">
                        <a href="{{ route('logout') }}"
              onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            <div class="inner-button">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </div>
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection