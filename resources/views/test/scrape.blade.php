@extends('layouts.app2')
@section('styles')
           <title>Scrapping Data - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<br><br>
<div class="container">
    <div class="row">
        @foreach($game as $game)
        @if($game != 'about:blank')
        <iframe src="{{$game}}" height="600px"></iframe>\
        @endif
        @endforeach
     
    </div>
</div>
@endsection