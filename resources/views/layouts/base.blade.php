@extends('layouts.app2')

@section('styles')
           
<title>{{$products->name}}</title>
<meta name="description" content="{{$products->metades}}">
<link rel="stylesheet" href="{{ asset('css/rproduct.css')}}" />
    <style>
        /* upload design */

.upload-design {
  margin-top: 30px;
}

.design-image {
  text-align: center;
  padding: 13px 0;
}

.upload .design-image {
  background-color: #c5d7e8;
}

.design .design-image {
  background-color: #e5d7da;
}

.upload-design img {
  width: 35%;
}

.design-text p {
  font-size: 17px;
  font-weight: 600;
  margin: 10px 0;
}

.design-text ul {
  padding-left: 15px;
}

.design-text li {
  list-style: initial;
  font-size: 15px;
  font-weight: 400;
}

.design-btn {
  margin: 22px 0;
  text-align: center;
}

.design-btn button, .btn-designs {
  width: 95%;
  margin: auto;
  border: none;
  background-color: #f3b19b;
  color: #fff;
  font-weight: 500;
  font-size: 17px;
  padding: 5px 0;
  border-radius: 4px;
}
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
/* end detail col */
    </style>
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


    <!-- end navbar -->

@livewireStyles

@livewire('details-component', ['slug'=>$slug])


    @livewireScripts 
    
    @endsection
