@extends('layouts.app2')
@section('style')
<title>PrintMeAll - Best Printing Collection</title>
 <meta name="description" content=" PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/styles1.css?v=2.0') }}" />
<link rel="stylesheet" href="{{ asset('css/accordion.css') }}" />
<style>
     /* .instagram .swiper-slide{

      }
      .instagram img {
        width: 100%;
        object-fit: cover;
      } */
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;

        }

        .product-slide {
            height: auto;
        }

.slider-products-cards {
  margin-top: 50px;
}

.slider-product-card {
  position: relative;
  transition: all 0.3s;
  margin-bottom: 50px;
  text-align:left;
}

.slider-product-card:hover {
  box-shadow: 0 0 8px 0 rgb(179, 179, 179);
}

.slider-product-image img {
  width: 100%;
  height: 250px;
  object-fit: cover;
}

.slider-product-text {
  padding: 15px;
}

.slider-product-title p {
  margin-bottom: 5px;
  font-size: 18px;
  font-weight: 600;
}

.slider-product-price {
  font-weight: 400;
}

.slider-product-detail-points ul {
  padding: 0;
}

.slider-product-detail-points {
  margin-bottom: 50px;
}

.slider-product-detail-points ul li {
  list-style: none;
  position: relative;
  padding-left: 15px;
  font-size: 15px;
  color: #323c49;
}

.slider-product-detail-points ul li::after {
  content: "";
  display: block;
  position: absolute;
  top: 0.65em;
  left: 0;
  width: 0.25rem;
  height: 0.25rem;
  background-color: #323c49;
  border-radius: 100%;
}

.slider-product-btn {
  position: absolute;
  bottom: 20px;
}

.slider-product-btn a,
.category-links a {
  color: #ff9e77;
  text-decoration: none;
  font-weight: 500;
  font-size: 17px;
}

.slider-product-btn a i,
.category-links a i {
  font-size: 12px;
  padding-left: 5px;
  transition: all 0.3s;
}

.slider-product-btn a:hover i,
.category-links a:hover i {
  padding-left: 13px;
}

.categories {
  margin-top: 50px;
}

.category-head p {
  font-size: 20px;
  font-weight: 700;
  color: #323c49;
}

.category-links a {
  display: block;
  margin-bottom: 13px;
  font-size: 17px;
  color: #e2662c;
}

@media screen and (max-width: 980px) {
  .products {
    padding: 0 10px;
  }

  .category-header {
    height: 200px;
    padding: 0 20px;
  }

  .header-inner {
    width: 100%;
  }

  .category-header .header-inner p:nth-child(1) {
    font-size: 26px;
  }

  .category-header .header-inner p:nth-child(2) {
    font-size: 16px;
  }

  .products-head {
    text-align: center;
    margin-top: 50px;
  }

  .products-head p:nth-child(1) {
    font-size: 25px;
  }

  .products-head p:nth-child(2) {
    font-size: 16px;
  }

  .slider-product-title {
    margin-top: 20px;
  }

  .slider-product-title p {
    font-size: 17px;
  }

  .slider-product-detail-points ul li {
    font-size: 14px;
  }

  .slider-product-detail-points ul li::after {
    width: 0.22rem;
    height: 0.22rem;
  }

  .slider-product-btn {
    position: absolute;
    bottom: 10px;
  }

  .slider-product-btn a {
    color: #ff9e77;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
  }

  .slider-product-btn a i {
    font-size: 12px;
    padding-left: 5px;
    transition: all 0.3s;
  }

  .slider-product-btn a:hover i {
    padding-left: 13px;
  }
}
    </style>
@stop
@section('script')
<script src="{{asset('js/script1.js')}}"></script>
     <script>
      var swiper = new Swiper(".mySwiperg", {
        slidesPerView: 3,
        spaceBetween: 0,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 0,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 0,
          },
        },
      });

      var swiper = new Swiper(".mySwiper-banner", {
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
});
    </script>
    <!-- Initialize Swiper
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    -->
    <script>
        var swiper = new Swiper(".mySwiper-product", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop:true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
            },
        });
    </script>
    <script src="{{ asset('js/accordin.js')}}" ></script>
        <script src="{{ asset('js/script.js')}}" ></script>
@stop
@section('content')
 <!-- banner -->
    <div class="home-top-silder">
        <!-- Swiper -->
        <div class="swiper mySwiper-banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="home-banner top-slider" style="width:100% !important;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="banner-text col-md-5 col-12">
                                    <div class="text">
                                        <h1>CUSTOM BOXES MADE EASY</h1>
                                        <p>Print Me All is the state-of-the-art one-stop custom boxes solution provider
                                            with creative print ideas in all over UAE.</p>
                                        <div class="banner-btn">
                                            <a class="banner-color-btn" href="{{url('/about-us')}}">GET QUOTE</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="home-banner-2 top-slider">
                        <div class="container-fluid g-0">
                            <div class="row">
                                <div class="banner-text col-md-5 col-12">
                                    <div class="text">
                                        <h1>FOOD PACKAGING FOR RESTAURANTS</h1>
                                        <p>Food Packaging for small restaurants, Home based Kitchens, Pizza boxes for
                                            Take aways, Bakery Products under one roof with low MOQ.</p>
                                        <div class="banner-btn">
                                            <a class="banner-color-btn" href="{{url('/category/food-packaging')}}">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-image col-7">
                                    <img src="images/food packaging Slider final-min.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="home-banner-3 top-slider">
                        <div class="container-fluid g-0">
                            <div class="row">
                                <div class="banner-text col-md-5 col-12">
                                    <div class="text">
                                        <h1>CORPORATE IDENTITY BRANDING</h1>
                                        <p>Business Cards, Letterheads, File Folders, Brouchers, Flyers, Catalogs and
                                            Brand Books High Quality with Lowest MOQ.</p>
                                        <div class="banner-btn">
                                            <a class="banner-color-btn" href="{{url('/category/print-products')}}">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-image col-7">
                                    <img src="images/COrporate Identity Slider final (1)-min.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->

    </div>


    <!-- end banner -->

    <!-- features -->

    <div class="features">
        <div class="features-top">
            <p class="features-head">
                FAST & RELIABLE CUSTOM PACKAGING
            </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-1.png')}}" alt="">
                </div>
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-2.png')}}" alt="">
                </div>
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-3.png')}}" alt="">
                </div>
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-4.png')}}" alt="">
                </div>
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-5.png')}}" alt="">
                </div>
                <div class="feature-col col-md-2 col-4">
                    <img src="{{ asset('images1/Pri-me-all/icon-6.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- end features -->
    <div class="box-style">
        <div class="box-style-top">
            <p class="box-style-head">
                PICK YOUR STYLE
            </p>
            <P>
                With quick turn around and low minimums, we're a leading custom printed box manufacturer to wholesaler
                and retail brands for a reason.
            </P>
        </div>

        <div class="cards">
                    <div >
        <div class="products-top">
            <div class="slider-products-cards">
                        <!-- Swiper -->
                        <div class="swiper mySwiper-product">
                            <div class="swiper-wrapper">
                               @foreach( $pcategories as $product )
                                <div class="swiper-slide">
                        <div class="product-card">
                            <div class="card-image">
                                @if($product->image==null)
                                <img src="https://5.imimg.com/data5/XT/LT/MY-49018976/buddha-enlightenment-1-500x500.jpg" alt="">
                                @else
                           <img src="{{url('/')}}/public/images/{{ $product->image }}" alt="">                @endif
                            </div>
                            <div class="card-name">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="card-btn">
                                <a href="{{ url('category/'.preg_replace('/\s+/', '', $product->id))}}">View more</a>
                            </div>
                        </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
            <!-- <P>
                With quick turn around and low minimums, we're a leading custom printed box manufacturer to wholesaler
                and retail brands for a reason.
            </P> -->
        </div>
        <div class="products-top">
            <div class="slider-products-cards">
                        <!-- Swiper -->
                        <div class="swiper mySwiper-product">
                            <div class="swiper-wrapper">
                               @foreach( $pcategories2 as $product )
                                <div class="swiper-slide">
                        <div class="product-card">
                            <div class="card-image">
                                @if($product->image==null)
                                <img src="https://5.imimg.com/data5/XT/LT/MY-49018976/buddha-enlightenment-1-500x500.jpg" alt="">
                                @else
                           <img src="{{url('/')}}/public/images/{{ $product->image }}" alt="">                @endif
                            </div>
                            <div class="card-name">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="card-btn">
                                <a href="{{ url('category/'.preg_replace('/\s+/', '', $product->id))}}">View more</a>
                            </div>
                        </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
            <!-- <P>
                With quick turn around and low minimums, we're a leading custom printed box manufacturer to wholesaler
                and retail brands for a reason.
            </P> -->
        </div>

       <!-- <div class="products-btn">
            <a href="{{ url('cate') }}">VIEW ALL PRODUCTS</a>
        </div>-->
    </div>

        </div>
    </div>
    <!-- box style
    <div class="video-embed">
        <div class="video-top">
            <p class="video-head">
                why 1000s of happy customers turn to print me all
            </p>
        </div>
        <div class="video">
            <div class="iframe-container">
                <iframe width="728" height="410" src="https://www.youtube.com/embed/RW1HJdW5XLs"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>-->
    <!-- end youtube video -->
    <!-- divider -->
    <div class="divider">
        <div class="inner-divider">
        </div>
    </div>
    <!-- end divider -->
    <!-- products -->
    <div class="products">
        <div class="products-top">
            <p class="products-head">
                BEST PRINTED PRODUCTS
            </p>
            <div class="slider-products-cards">
                        <!-- Swiper -->
                        <div class="swiper mySwiper-product">
                            <div class="swiper-wrapper">
                                   @foreach( $products as $product )
                                <div class="swiper-slide product-slide">
                                    <div class="slider-product-card">
                                        <div class="slider-product-image">
                                            <img src="{{url('/')}}/storage/app/images/{{$product->image}}" alt="">
                                        </div>
                                        <div class="slider-product-text">
                                            <div class="slider-product-title">
                                                <p>{{ $product->name }}</p>
                                            </div>
                                            <div class="slider-product-price">
                                                <p>Starting From <b></b></p>
                                            </div>
                                            <div class="slider-product-detail-points" >
                                               {{ substr(strip_tags($product->description), 0, 60) }}
                                            </div>
                                            <div class="slider-product-btn">
                                               <center> <a class="quote" href="{{ url('products/'.preg_replace('/\s+/', '', $product->slug))}}">Buy Now<i class="fas fa-chevron-right"></i></a></center>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
            <!-- <P>
                With quick turn around and low minimums, we're a leading custom printed box manufacturer to wholesaler
                and retail brands for a reason.
            </P> -->
        </div>
       <!-- <div class="products-btn">
            <a href="{{ url('cate') }}">VIEW ALL PRODUCTS</a>
        </div>-->
    </div>
    <!-- end products -->

    <!-- reviews -->

    <div class="reviews">
        <div class="reviews-top">
            <p class="reviews-head">
                What People Say
            </p>
        </div>
           <!--Swiper -->
        <div class="swiper mySwiper">
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
                                    The quality is excellent and no doubt your company prides (itself) on using the
                                    best
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
            <!--<div class="swiper-pagination"></div>-->
        </div>
  </div>
    <!-- end reviews -->
    <!-- printmeall products -->
       <div class="slider-bottom">
        <div class="slider-bottom-btn">
            <a href="" class="slider-button" data-button="1">Shop Products</a>
            <a href="" class="slider-button" data-button="2">Browse Project</a>
            <a href="" class="slider-button" data-button="3">How it Works</a>
        </div>

        <div class="designer-level hover-dropdown hover-dropdown-1">
            <div class="designer-level-cards">
                <div class="container-fluid">
                    <div class="row">
                        <div class="level beginner-level col-md-3">
                            <div class="inner-level">
                                <div class="level-top">
                                    <p>Print Products</p>
                                </div>
                                <div class="level-description">
                                    @foreach($bcategory as $bcategory)
                                    <li><a href="{{url('subcategory')}}/{{$bcategory->id}}">{{$bcategory->name}}</a></li>
                                    @endforeach
                                </div>
                                <div class="level-btn">
                                    <a href="{{url('/')}}/category/4">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="level intermediate-level col-md-3">
                            <div class="inner-level">
                                <div class="level-top">
                                    <p>Large Prints</p>
                                </div>
                                <div class="level-description">
                                    @foreach($fcategory as $bcategory)
                                    <li><a href="{{url('subcategory')}}/{{$bcategory->id}}">{{$bcategory->name}}</a></li>
                                    @endforeach
                                    <li><a href="{{url('/')}}/category/17">Labels and Stickers</a></li>
                                </div>
                                <div class="level-btn">
                                    <a href="{{url('/')}}/category/12">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="level expert-level col-md-3">
                            <div class="inner-level">
                                <div class="level-top">
                                    <p>Packaging </p>
                                </div>
                                <div class="level-description">
                                    @foreach($pcategory as $bcategory)
                                    <li><a href="{{url('subcategory')}}/{{$bcategory->id}}">{{$bcategory->name}}</a></li>
                                    @endforeach
                                </div>
                                <div class="level-btn">
                                    <a href="{{url('/')}}/category/5">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="level guru-level col-md-3">
                            <div class="inner-level">
                                <div class="level-top">
                                    <p>Promotional Items</p>
                                </div>
                                <div class="level-description">
                                    @foreach($picategory as $bcategory)
                                    <li><a href="{{url('subcategory')}}/{{$bcategory->id}}">{{$bcategory->name}}</a></li>
                                    @endforeach
                                </div>
                                <div class="level-btn">
                                    <a href="{{url('/')}}/category/9">See all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="projects hover-dropdown hover-dropdown-2">
                    <div >
        <div class="products-top">
            <div class="slider-products-cards">
                        <!-- Swiper -->
                        <div class="swiper mySwiper-product">
                            <div class="swiper-wrapper">
                               @foreach( $pcategories as $product )
                                <div class="swiper-slide">
                        <div class="product-card">
                            <div class="card-image">
                                @if($product->image==null)
                                <img src="https://5.imimg.com/data5/XT/LT/MY-49018976/buddha-enlightenment-1-500x500.jpg" alt="">
                                @else
                           <img src="{{url('/')}}/public/images/{{ $product->image }}" alt="">
                                @endif
                            </div>
                        </div>
                   </div>
                             @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
        </div>
        <div class="products-top">
            <div class="slider-products-cards">
                        <!-- Swiper -->
                        <div class="swiper mySwiper-product">
                            <div class="swiper-wrapper">
                               @foreach( $pcategories2 as $product )
                                <div class="swiper-slide">
                        <div class="product-card">
                            <div class="card-image">
                                @if($product->image==null)
                                <img src="https://5.imimg.com/data5/XT/LT/MY-49018976/buddha-enlightenment-1-500x500.jpg" alt="">
                                @else
                           <img src="{{url('/')}}/public/images/{{ $product->image }}" alt="">                @endif
                            </div>
                            <div class="card-name">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="card-btn">
                                <a href="{{ url('category/'.preg_replace('/\s+/', '', $product->id))}}">View more</a>
                            </div>
                        </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
             </div>
            </div>
        </div>
        <!-- FAQ -->
        <div class="blur"></div>
        <div class="faq hover-dropdown hover-dropdown-3">
            <div class="faq-top">
                <p class="faq-head">
                    Frequently Asked Question
                </p>
                <div class="underline"></div>
            </div>
            <div class="inner-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="accordion">
                            <div class="accordion-block accordion-active">
                                <div class="head">
                                    <p>Can you design my custom boxes?</p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="body">
                                    <p>
                                        Definitely! We have an in-house group of graphic designers who can help bring
                                        your brand to life. As part of our
                                        continued commitment to quality, we offer 100% free design support to all of our
                                        customers.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-block">
                                <div class="head">
                                    <p>How do I place my order? What happens after I place my order?</p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="body">
                                    <p>Once you’re ready to get started, here’s what to expect.

                                        Contact our team through live chat on our website, one of our online forms, or
                                        give us a call to let us know the details
                                        of your order. After we receive your project specifications, a customer service
                                        representative will contact you with a
                                        free quote for your review! Your customer service representative will walk you
                                        through any questions you may have
                                        regarding artwork, mockups, design or otherwise. Next, your order details will
                                        be confirmed and your invoice will be
                                        sent to confirm your order.

                                        After your invoice is submitted, the next step is previewing your artwork!
                                        Before printing your boxes, we will create
                                        and share 2D and 3D mockups of your boxes based on your provided artwork. This
                                        means that you will be able to see every
                                        aspect of your design, from every angle, before moving your order into
                                        production.

                                        Once you review and approve the designs, your order will go into production and
                                        ship to you within the stated turnaround
                                        time for your unique needs.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-block">
                                <div class="head">
                                    <p>How do I get a quote for my project? How long will it take to get a quote?
                                    </p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="body">
                                    <p>Contact our sales team through live chat, one of our online forms, or give us a
                                        call to let us know the details of your
                                        order. After we receive your project specifications, a customer service
                                        representative will contact you with a free
                                        quote for your review. We provide responses to all quote requests within 24
                                        hours on business days.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-block">
                                <div class="head">
                                    <p>Can I print artwork on the inside and outside of the box?</p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="body">
                                    <p>Yes! We frequently print 2-sided boxes that include your artwork both inside and
                                        outside of the custom boxes. We are
                                        able to print on the outside (1-side) and the inside of boxes (2-side). There
                                        may be additional fees for 2-sided
                                        printing, please discuss this directly with your customer service representative
                                        for details.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-block">
                                <div class="head">
                                    <p>What are your turnaround times after I place my order? When will I receive my
                                        order?</p>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="body">
                                    <p>While turnaround time varies depending on each customer’s unique specifications,
                                        our standard turnaround time for custom
                                        box orders is 8-10 business days after final design approval.

                                        Bulk or rigid custom box orders may require additional production and/or
                                        shipping time, which we will share with you
                                        ahead of time. While we maintain an extremely high level of accuracy in our
                                        stated turnaround times, delivery estimates
                                        cannot be guaranteed. If your delivery date is time-sensitive, we highly
                                        recommend that you discuss rush production and
                                        expedited shipping with your customer service representative.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq-image col-lg-5 col-md-12">
                            <img src="images/banner-1.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- end FAQ -->
        <div class="container" style="margin-top:5%;">
              <a href="{{url('/designers')}}" ><img style="width:100% !important;" src="https://printmeall.com/images/hire-a-designer-min.jpg" /></a>
        </div>
    </div>


    <!-- end FAQ -->
       <div class="footer-top-line">
    </div>

@endsection
