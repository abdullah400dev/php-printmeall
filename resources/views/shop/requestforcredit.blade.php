@extends('layouts.app2')

    @section('styles')
           <title>Request For Credit - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
            <link rel="stylesheet" href="{{ asset('css/product.css')}}" />
             <link rel="stylesheet" href="css/signup.css">
      @stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
 <div class="cart-content">
        <div class="cart-heading container">
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid form">
            <div class="form-top">
            <p>Request For Credit</p>
        </div>
           <form action="{{ route('requestcredits') }}" method="post" id="formID" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you have provide valid documents and want to request for credit?')">
                      @csrf
              <div class="email field">
                <label for="amount">Amount</label>
                    <input type="number" class="@error('amount') is-invalid @enderror" name="amount" placeholder="Enter Credit Amount"  value="{{ old('amount') }}" required >
                                                 @error('amount')
                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                          </span>
                                @enderror
                  </div>
                   <div class="email field">
                <label for="time">Days</label>
                    <input type="number" class="@error('amount') is-invalid @enderror" name="time" placeholder="Enter Days"  value="{{ old('time') }}" required >
                                                 @error('time')
                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                          </span>
                                @enderror
                  </div>
                  <div class="email field">
                <label for="time">Document (s)</label>
                    <input type="file" class="@error('amount') is-invalid @enderror" name="documents[]" placeholder="Upload Your Documents"  value="{{ old('documents') }}" multiple required >
                                                 @error('time')
                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                          </span>
                                @enderror
                  </div>
                   <div class="form-sign-btn">
                                <button id="submitID" type="submit">
                                    {{ __('Send Request') }}
                                </button>
                    </div>
           </form>
           <br><br>
        </div>
    </div>
           <br><br>
           <br><br>

@endsection