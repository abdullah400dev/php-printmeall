@extends('layouts.app2')

@section('styles')
          <title>Order Received - Print Me All</title>
            <meta name="description" content=" ">
<link rel="stylesheet" href="{{ asset('css/styles1.css')}}" />

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
    <h2>Thank You - Your Order Has Been Received</h2>
</div>
	<br><br>
<div class="container">
    <div class="alert alert-success" role="alert">
 <center> A confirmation email has been sent</center>
</div>
 <br>
 <center><a class="quote" href="{{url('/')}}">Continue Shopping</a></center>
	<br><br>
</div>



@endsection