@extends('layouts.app2')

@section('styles')
           <title>My Gigs - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')

 <div class="cart-content">
        <div class="cart-heading">
            <p>My Gigs<a href="{{url('addgig')}}" style="font-size: 18px; margin-left: 15px; ">New Gig <i class="fa fa-edit"></i></a> <a href="{{url('designer-data')}}" style="font-size: 18px; margin-left: 15px; ">Update <i class="fa fa-edit"></i></a></p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
            @if(auth()->user()->designer && auth()->user()->designer->status != '1')
             <div class="alert alert-warning" role="alert">
                 Your Account is in review/deactive. As soon as it will be approve, your services will become online.
             </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-12 col-12">
                    @if($gigs->count() > 0)
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">GigId</th>
      <th scope="col">Name</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($gigs as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->created_at}}</td>
      <td><a href="/updategig/{{$item->id}}"><button type="button" class="btn btn-info" style="color:white;">Details</button></a></td>
    </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any gig history</center></div>
                       @endif
                </div> 
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>
@endsection