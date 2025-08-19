@extends('layouts.app2')

@section('styles')
           <title>All Categories</title>
            <meta name="description" content="All Categories Description goes Here.">
            <link rel="stylesheet" href="{{ asset('css/styles1.css')}}" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<div class="catname12">
<h2 >CATEGORIES</h2>
</div>


	   <!-- box style -->
 <div class="row">
  <div class="col-md-4 col-sm-6">
      <div class="bs-example">
    <div class="accordion" id="accordionExample">
               @foreach( $categories as $category )
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" style=" width: 100%;" class="sidebutton btn btn-link" data-toggle="collapse" data-target="#coll{{$category->id}}"><a href="{{url('cat/'.$category->id)}}" style="color:black;">{{$category->name}}</a> <span><i  style="color:black;" class="iconleft fa fa-plus"></i> </span></button>
                </h2>
            </div>
            <div id="coll{{$category->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                    @foreach( $category->products as $subcategory )
                   <p> <a href="{{url('product/'.$subcategory->id)}}" style="color:black;">{{$subcategory->name}}</a></p>
                    @endforeach
                    </p>
                </div>
            </div>
        </div>
 @endforeach
    </div>
</div>


  </div>
  <div class="col-md-8 col-sm-6">
    <div class="features">
        <div class="cards">
            <div class="container">
                <div class="row">
                     @foreach( $products as $product )
                    <div class="card-col col-md-4 col-6">
                        <div class="product-card">
                            <a href="{{ url('product/'.preg_replace('/\s+/', '', $product->id))}}">
                            <div class="card-image">
                             <img src="{{$product->fImg }}" alt="">
                            </div></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
    <!-- end box style -->
</div>




@endsection
