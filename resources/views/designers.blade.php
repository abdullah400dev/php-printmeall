@extends('layouts.app2')

@section('styles')
           <title>Our Designers - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/freelancers.css?v=1.1')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')

    <!-- top section -->

    <div class="top-section">
        @if($designer)
        <h1>Designer {{$designer->name}} Services</h1>
        @else
        <h1>Our Designers</h1>
        @endif
        <p>Start a design project today & recieve 60 to 100+ custom designs from competing designers. <a href=""> &nbsp;
                <i class="fas fa-play-circle"></i> How Designer works.</a></p>
    </div>

    <!-- end top section -->

    <!-- dropdowns -->
@if(app('request')->input('designer'))
@else
    <div class="dropdowns-menu">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Freelancer Level
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="?level=1">Junior</a></li>
                <li><a class="dropdown-item" href="?level=2">Medium</a></li>
                <li><a class="dropdown-item" href="?level=3">Expert</a></li>
            </ul>
        </div>
    </div>
@endif
    <!-- end dropdowns -->

    <!-- gig cards -->

    <div class="gig-cards">
        <div class="container-fluid">
            <div class="row">
                @foreach($product as $prodct)
                <div class="gig col-lg-3 col-sm-6">
                    <div class="inner-gig">
                        <div class="card-image">
                            <img src="{{url('/')}}/storage/app/images/{{$prodct->image}}" alt="">
                        </div>
                        <div class="name-details">
                            <div class="details-image">
                                <img src="images/review.png" alt="">
                            </div>
                            <div class="details-name">
                                <p>{{$prodct->name}}</p>
                                <p>Designer</p>
                            </div>
                        </div>
                        <div class="gig-description">
                            <p>I will create awesome mascot for your twitch, esports, sports Logo <!--{!! $prodct->short_description !!}--></p>
                        </div>
                        <!--<div class="gig-ratings">
                            <p> <span> <i class="fas fa-star"></i> 4.8 </span> &nbsp; (146)</p>
                        </div>-->
                        <div class="gig-price">
                           <!-- <i class="fas fa-heart"></i>-->
                            <a href="{{ url('products/'.preg_replace('/\s+/', '', $prodct->slug))}}">Explore Service</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

{{ $product->links() }}


    <!-- end gig cards -->

@endsection
