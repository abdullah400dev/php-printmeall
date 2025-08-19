@extends('layouts.app2')

@section('styles')
           <title>Designer Details - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/venderform.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function(){
        $('.multiple_dropdown').selectpicker();
    });
</script>

@stop
@section('content')

    <div class="form-page">
        <div class="form-top">
            <p>Designer Details</p>
        </div>
<div class="cart-content">
        <div class="cart-heading">
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
            
            @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
           {{ Session::get('fail') }}</div>
            @endif
        </div>
    </div>
        <div class="form">
            <form action="{{url('designerdata')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="personal-information information">
                    <div class="information-top">
                        <p>Personal Information</p>
                    </div>
                    <div class="personal-fields">
                        <div class="input-control">
                            <label for="">Description</label>
                            <input type="text" placeholder="Description" @if(Auth::user()->designer) value="{{auth()->user()->designer->description}}" @endif name="descripition" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Profile Images (optional)</label>
                            <input type="file" placeholder="Profile Images" name="image"/>
                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection