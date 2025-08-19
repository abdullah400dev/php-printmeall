@extends('layouts.app2')
@section('styles')
           <title>Verify Your Email Address</title>
    <link rel="stylesheet" href="{{ asset('css/product.css')}}" />
    <meta name="robots" content="noindex" />
  <!-- css file -->
    <link rel="stylesheet" href="css/signup.css?v=1.1">
    <style>
    .form-btn button {
    background-color: hsl(15, 79%, 70%) !important;
    }
    form i {
    margin-left: -30px;
    cursor: pointer;
}
    </style>
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<div class="container" style="margin:50px 0px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
