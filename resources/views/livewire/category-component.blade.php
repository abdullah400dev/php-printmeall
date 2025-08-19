@extends('layouts.app2')

@section('styles')
          <title>{{$category->name}} - Print Me All</title>
            <meta name="description" content="{{$category->metades}}">
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
        </div><br><br>
        <div class="container">
         <div class="row">
             @foreach( $category->rsubcates as $subcategory )
                    <div class="category-block col-lg-4 col-12">
                        @if($subcategory->fImg)
                       <center><a href="{{url('subcategory/'.$subcategory->slug)}}"> <img src="{{url('/')}}/public/images/{{$subcategory->fImg}}" id="imgh" alt=""> </a></center>
                       @else
                        <center><a href="{{url('subcategory/'.$subcategory->slug)}}"> <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-15.png" id="imgh" alt=""> </a></center>
                       @endif
                         <div class="category-links">
                   <center><a href="{{url('subcategory/'.$subcategory->slug)}}">{{$subcategory->name}} <i class="fas fa-chevron-right"></i></a></center>
                   </div>
                    </div>
          @endforeach
            </div>
        </div>

    </div>
</main>



@endsection
