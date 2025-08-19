@extends('layouts.app2')

@section('styles')
           <title>Update Bank Details- PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/account.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
 <div class="cart-content container">
     <div class="row">
         <div class="col-sm-4">
           <!--  <a href="{{url('/wallet/create')}}"><button type="button" class="btn btn-success">Request For Withdraw</button></a>-->
         </div>
         <div class="col-sm-8">
         </div>
     </div><br>
        <div class="cart-heading">
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
             @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
           {{ Session::get('error') }}</div>
            @endif
        </div>
          <div class="cart-heading">
            <p><b>Update Bank Details</b></p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if(auth()->user()->wallet)
                    <form action="{{route('wallet.bank')}}" method="POST" >
                        @csrf
                    <input type="text" class="form-control" name="bank_name" placeholder="Enter Your Bank Name" value="@if(auth()->user()->bankdetails){{auth()->user()->bankdetails->bank_name}}@endif" requried/>
                    <input type="text" class="form-control" name="bank_num" placeholder="Enter Your Bank Number" value="@if(auth()->user()->bankdetails){{auth()->user()->bankdetails->account_number}}@endif" requried/>
                    <input type="text" class="form-control" name="bank__holdername" placeholder="Enter Your Bank Holder Name" value="@if(auth()->user()->bankdetails){{auth()->user()->bankdetails->account_name}}@endif" requried/>

                    <button type="submit" class="btn btn-success">Update Bank Details </button>
                                       </form>
                                      <br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any amount</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>


@endsection