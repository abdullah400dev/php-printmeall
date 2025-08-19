@extends('layouts.app2')

@section('styles')
          <title>{{$category->name}} - Print Me All</title>
             <meta name="description" content=" ">
<link rel="stylesheet" href="{{ asset('css/head.css?v=1.1')}}" />
<link rel="stylesheet" href="{{ asset('css/category1.css')}}" />

		<style>
    .bs-example{
        margin-top: 20px;
		padding: 20% 8%
    }
    .accordion .fa1{
        margin-right: 0.5rem;
    }
	.catname12{
margin:auto;
text-align:center;
padding:5%;
font-size:400%;
font-weight:500;
color:#ffffff;
    background-color: hsl(15, 79%, 78%);
      margin-top:83px;
}
.sidebutton > a {
    float: left;
}
.sidebutton > span{
    float:right;
}
@media(min-width:980px){
#imgh{
    width:250px;
    height:250px;
}
}
nav{
    background-color:white;
}

.pagination{
        justify-content: center;
}
</style>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
@stop
@section('scripts')
<script src="{{asset('js/script1.js')}}"></script>
@stop
@section('content')
	<main id="main" class="main-site left-sidebar">
	     <div class="category-header">
        <div class="header-inner">
            <p>{{$category->name}}</p>
            <p>Let your {{$category->name}} do the talking with special finishes and unique sizes guaranteed to make an
                impression.</p>
        </div>
    </div>
        <div class="products">
        <div class="products-head">
            <p>Shop {{$category->name}}</p>
            <p>You can’t go wrong. We start at premium {{$category->name}} and go all the way to extra fancy.</p>
        </div>
          <div class="products-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="categories col-lg-2 col-12">
                        <div class="category-head">
                            <p>Categories</p>
                        </div>
                        <div class="category-links">
                 @foreach( $category->pcategory->rsubcates as $subcategory )
                   <a href="{{url('subcategory/'.$subcategory->slug)}}">{{$subcategory->name}} <i class="fas fa-chevron-right"></i></a>
                    @endforeach
                        </div>
                    </div>
                    <div class="products-cards col-lg-10 col-12">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($products as $product )
                                <div class="product-card col-lg-4 col-6">
                                    <div class="product-image">
                                       @if($product->image)
                               <img src="{{url('/')}}/storage/app/images/{{$product->image}}" id="imgh" alt="">
                               @else
                               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="No Image">
                               @endif
                                    </div>
                                    <div class="product-title">
                                        <p><b>{{$product->name}}</b></p>
                                    </div>
                                    <div class="product-price">
                                       <!-- <p>{{$product->name}} In <b>{{getcurrency()}}  {{getsingleprice($product)}}</b></p> -->
                                    </div>
                                    <div class="product-detail-points">
                                        {{ substr(strip_tags($product->description), 0, 60) }}
                                    </div>
                                    <div class="product-btn">
                                        <a class="quote" href="{{ url('products/'.preg_replace('/\s+/', '', $product->slug))}}"><b>Buy Now</b><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{$products->links()}}

@if(count($cproducts) > 0)
        <div class="products">
        <div class="products-head">
            <p>Shop Custom {{$category->name}}</p>
            <p>You can’t go wrong. We start at premium {{$category->name}} and go all the way to extra fancy.</p>
        </div>
          <div class="products-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="categories col-lg-2 col-12">
                    </div>
                    <div class="products-cards col-lg-10 col-12">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($cproducts as $product)
                                <div class="product-card col-lg-4 col-6">
                                    <div class="product-image">
                                       @if($product->image)
                               <img src="{{url('/')}}/storage/app/images/{{$product->image}}" id="imgh" alt="">
                               @else
                               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="No Image">
                               @endif
                                    </div>
                                    <div class="product-title">
                                        <p><b>{{$product->name}}</b></p>
                                    </div>
                                    <div class="product-price">
                                    </div>
                                    <div class="product-detail-points">
                                        {{ substr(strip_tags($product->description), 0, 60) }}
                                    </div>
                                    <div class="product-btn">
                                        <a class="quote" href="{{ url('product/')}}/{{$product->slug}}"><b>Buy Now</b><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{$cproducts->links()}}
@endif
</main>



@endsection
