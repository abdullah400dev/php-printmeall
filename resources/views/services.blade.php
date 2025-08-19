@extends('layouts.app2')

@section('content')

<div class="product">
    
</div>
<div class="container">
<form method="post" action="{{ url('/getaquote')}}">
    {{ csrf_field() }}
    @foreach( $products as $product )
    <input type="hidden" value="{{$product->id}}" name="productId" />
    @endforeach
     <lable>First Name</lable>
     <input type="text" value="" name="fname" class="form-control" required/>
     <br>
     <lable>Last Name</lable>
     <input type="text" value="" name="lname" class="form-control" required/>
     <br>
     <input type="submit" value="Submit" class="btn btn-success" />
    </form></div>
@endsection
