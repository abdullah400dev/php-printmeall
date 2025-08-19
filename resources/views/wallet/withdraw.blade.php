@extends('layouts.app2')

@section('styles')
           <title>Withdraw <?php echo strtoupper(app('request')->input('currency')); ?> Amount- PrintMeAll</title>
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
            <p><b>WidthDraw <?php echo strtoupper(app('request')->input('currency')); ?></b></p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if(auth()->user()->wallet)
                    <form action="{{route('wallet.store')}}" method="POST" >
                        @csrf
                    <input type="hidden" name="currency" value="{{app('request')->input('currency')}}" required/>
                    <input type="number" class="form-control" name="amount" placeholder="Maximum Amount should be less than wallet Ammoun" requried/>
                    <button type="submit" class="btn btn-success">Request For Withdraw <?php echo strtoupper(app('request')->input('currency')); ?></button>
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