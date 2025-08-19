@extends('layouts.app2')

@section('styles')
          <title>{{$product->name}}</title>
           <meta name="description" content="{{$product->metades}} ">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<style>
    .product{
        margin-top:0px !important;
    }
    .h2, h2 {
    font-size:1.4rem !important;
    }
</style>
@stop
@section('scripts')
<script src="{{asset('js/product.js')}}"></script>
  <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">
(function(){
$('.from-prevent-multiple-submits').on('submit', function(){
    $('.from-prevent-multiple-submits').attr('disabled','true');
})
})();
</script>
@stop
@section('content')

<div class="product">
    <div class="inner-product">
        <div class="product-top">
            <div class="product-name">
                <p>{{ $product->name }}</p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="product-image-col">
                        <!-- Swiper -->

                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                                       <?php
                        foreach(json_decode($product->images) as $image){
                           ?>
                                                               <div class="swiper-slide">
                                    <img src="{{url('/')}}/storage/app/images/<?php echo $image; ?>" />
                                </div>
                                 <?php
                            }
                        ?> </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                                                  <?php
                        foreach(json_decode($product->images) as $image){
                           ?>
                                                               <div class="swiper-slide">
                                    <img src="{{url('/')}}/storage/app/images/<?php echo $image; ?>" />
                                </div>
                                 <?php
                            }
                        ?>
                            </div>
                        </div>

                        <!-- Swiper JS -->
                    </div>
                    <div class="product-detail-col">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {!! Session::get('success') !!}
                          </div>
                        @endif
                       @php $truncated = Str::of($product->description)->limit(800); @endphp
                          <div> {!! html_entity_decode(strip_tags($truncated)) !!}</div>
                        </p>
                        <hr>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="product-feature-col">
                                    <p><i class="fas fa-ban"></i> Low Minimum Order Quantity</p>
                                    <p><i class="fas fa-truck"></i> Free Shipping & Fast Delivery</p>
                                    <p><i class="far fa-thumbs-up"></i> Free Design Support & Consultation</p>
                                </div>
                                <div class="product-feature-col">
                                    <p><i class="far fa-clock"></i> 10-12 Days Turn Around Time</p>
                                    <p><i class="fas fa-crop"></i> Can Be Made in Any Custom Size</p>
                                    <p><i class="far fa-check-circle"></i> Secure & Easy Order Process</p>
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="product-form-col">
                            <form method="post" class="from-prevent-multiple-submits" action="{{ url('/getaquote')}}" >
                               {{ csrf_field() }}
                                <div class="form-name">
                                    <p>Get a quote</p>
                                </div>
                    <input type="hidden" value="{{$product->id}}" name="productId" />
                    <div class="row">
                        @php $formfieldsarray = json_decode($product->formfields, true);  @endphp
                        @foreach($formfieldsarray as $key => $formfields)
                        @if(isset($formfieldsarray[$key]['feild']) && $formfieldsarray[$key]['feild'] == 1)
                         <div class="col-sm-12">
                            <input type="number" name="{{$formfieldsarray[$key]['name']}}" placeholder="{{$formfieldsarray[$key]['name']}}" required>
                        </div>
                         @elseif(isset($formfieldsarray[$key]['feild']) && $formfieldsarray[$key]['feild'] == 2)
                         <div class="col-sm-12">
                            <input type="text"  name="{{$formfieldsarray[$key]['name']}}" placeholder="{{$formfieldsarray[$key]['name']}}" required>
                        </div>
                       @elseif(isset($formfieldsarray[$key]['feild']) && $formfieldsarray[$key]['feild'] == 3)
                         <div class="col-sm-12">
                             <select name="{{$formfieldsarray[$key]['name']}}" required>
                                 <option value="">{{$formfieldsarray[$key]['name']}}</option>
                                 @foreach(explode(",", $formfieldsarray[$key]['values']) as $dropvalue)
                                 <option value="{{$dropvalue}}">{{$dropvalue}}</option>
                                 @endforeach
                             </select>
                        </div>
                         @elseif(isset($formfieldsarray[$key]['feild']) && $formfieldsarray[$key]['feild'] == 4)
                         <div class="col-sm-12">
                            <input type="text"  name="{{$formfieldsarray[$key]['name']}}" placeholder="{{$formfieldsarray[$key]['name']}}" required>
                        </div>
                        @else

                        @endif
                        @endforeach
                         <div class="col-sm-12">
                            <input type="text"  name="squantity" placeholder="Enter Quantity" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text"  name="fname" placeholder="First Name" @if(auth()->check()) value="{{auth()->user()->name}}" @endif required>
                        </div>
                         <div class="col-sm-6">
                            <input type="text"  name="lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <input type="tel"  name="phone"  id="" placeholder="Phone Number" required>
                    <input type="email" name="email" id="" @if(auth()->check()) value="{{auth()->user()->email}}" @endif placeholder="Email" required>
                    @if(!auth()->check())
                    <input type="password" name="password" id="" placeholder="Enter Your Password" required>
                    @endif
                    <textarea name="msg" id="" cols="30" rows="3" placeholder="Your Message" required></textarea>
                                <div class="form-button">
                                    <button type="submit" class="form-btn from-prevent-multiple-submits" style="background:#f5794e">Send</button>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

  <div class="vertical-tabs">
        <div class="about-product">
            <div class="tabs-top">
                <p class="tabs-head">About the product</p>
            </div>


            <div class="container">
                <div class="row">
                    <div class="tabs-link-col col-md-4 col-12">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'London')"
                                id="defaultOpen">Description</button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">Specification</button>
                            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Rewiews</button>
                        </div>
                    </div>

                    <div class="tabs-content-col col-md-8 col-12">
                        <div id="London" class="tabcontent">
                            <p>
                            {!! $product->description !!}
                            </p>
                        </div>

                        <div id="Paris" class="tabcontent">
                          <table class="table table-striped">
  <tbody>
    <tr>
      <td>Dimensions</td>
      <td >All Custom Sizes & Shapes</td>
    </tr>
    <tr>
      <td>Printing</td>
      <td>CMYK, PMS, No Printing</td>
    </tr>
     <tr>
      <td>Paper Stock	</td>
      <td>CMYK, PMS, No Printing</td>
    </tr>
        <tr>
      <td>Quantities	</td>
      <td>10pt to 28pt (60lb to 400lb) Eco-Friendly Kraft, E-flute Corrugated, Bux Board, Cardstock
</td>
    </tr>
        <tr>
      <td>Coating</td>
      <td>100 – 500,000</td>
    </tr>
        <tr>
      <td>Default Process	</td>
      <td>Die Cutting, Gluing, Scoring, Perforation</td>
    </tr>
        <tr>
      <td>Options</td>
      <td>Custom Window Cut Out, Gold/Silver Foiling, Embossing, Raised Ink, PVC Sheet.</td>
    </tr>
        <tr>
      <td>Proof</td>
      <td>Flat View, 3D Mock-up, Physical Sampling (On request)</td>
    </tr>
        <tr>
      <td>Turn Around Time</td>
      <td>4-6 Business Days, Rush</td>
    </tr>
  </tbody>
</table>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                                <div class="swiper mySwiper3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="inner-review">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="image-col">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPItgwd9rziBWRB0Vith5SyawWafeeKQAw7yhK3F1Pblnab77ySloDNUnPyiXVviBBvYs&usqp=CAU"
                                                            alt="google users">
                                                    </div>
                                                    <div class="name-col">
                                                        <p>Ahmed Ahsan</p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    <p>
                                                        The quality is excellent and no doubt your company prides
                                                        (itself) on using
                                                        the best
                                                        processes to produce.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner-review">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="image-col">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPItgwd9rziBWRB0Vith5SyawWafeeKQAw7yhK3F1Pblnab77ySloDNUnPyiXVviBBvYs&usqp=CAU"
                                                            alt="google users">
                                                    </div>
                                                    <div class="name-col">
                                                        <p>Ahmed Ali</p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    <p>
                                                        I buy printed mug from here. I was awesome. You quality, customer service and prices and great. You got a permanent buyer.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner-review">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="image-col">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPItgwd9rziBWRB0Vith5SyawWafeeKQAw7yhK3F1Pblnab77ySloDNUnPyiXVviBBvYs&usqp=CAU"
                                                            alt="google users">
                                                    </div>
                                                    <div class="name-col">
                                                        <p>Alex Steve</p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    <p>
                                                        You service is great. I order a gift for my wife. I was perfectly the same as i was expecting. Thanks
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="inner-review">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="image-col">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPItgwd9rziBWRB0Vith5SyawWafeeKQAw7yhK3F1Pblnab77ySloDNUnPyiXVviBBvYs&usqp=CAU"
                                                            alt="google users">
                                                    </div>
                                                    <div class="name-col">
                                                        <p>Sohail Shareef</p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="description">
                                                    <p>
                                                        Flyers rates and service are best. I order set of flyers for my company and i was lovely. You service is really impressive.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- footer -->
    <div class="footer-top-line">

    </div>


@endsection
