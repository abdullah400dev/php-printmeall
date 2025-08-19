<div class="cart-content">
       <br><br><br>
        <div class="cart-heading">
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-lg-2"></div>
                <div class="cart-items col-lg-8 col-12">
                    @if($orders->count() > 0)
                    <h4><center><b>Order Items</b></center></h4>
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
    </tr>
  </thead>
  <tbody>
     @foreach($orders->orderItems as $item)
    <tr>
      <td>{{$item->rproduct->name}}</td>
      <td><img src="{{url('/')}}/storage/app/images/{{$item->rproduct->image}}" style="height:50px; width:50px;"/></td>
      <td>{{$item->price}}</td>
      <td>{{$item->quantity}}</td>
        </tr>
                       @endforeach
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any order history</center></div>
                       @endif
                </div>
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
        <br>    <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-lg-2"></div>
                <div class="cart-items col-lg-8 col-12">
                    @if(!is_null($orders->shipping))
                    <h4><center><b>Shipping Details</b></center></h4>
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
       <th scope="col"></th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
     <th scope="col">Email</th>
     <th scope="col">Address 1</th>
     <th scope="col">City</th>
     <th scope="col">State</th>
     <th scope="col">Country</th>
     <th scope="col">Zip Code</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td></td>
         <td>{{$orders->shipping->firstname}}</td>
         <td>{{$orders->shipping->lastname}}</td>
         <td>{{$orders->shipping->mobile}}</td>
         <td>{{$orders->shipping->email}}</td>
        <td>{{$orders->shipping->line1}}</td>
        <td>{{$orders->shipping->city}}</td>
        <td>{{$orders->shipping->province}}</td>
        <td>{{$orders->shipping->country}}</td>
        <td>{{$orders->shipping->zipcode}}</td>
        </tr>
             </tbody>
            </table><br><br>
                       @else
                      @endif
                </div>
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
       <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-lg-2"></div>
                <div class="cart-items col-lg-8 col-12">
                    @if($orders->transaction->count() > 0)
                    <h4><center><b>Transaction Details</b></center></h4>
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
       <th scope="col"></th>
      <th scope="col">Mode</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td></td>
      <td>{{$orders->transaction->mode}}</td>
       <td>{{$orders->transaction->status}}</td>
        <td>{{$orders->transaction->created_at}}</td>
        </tr>
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any transaction history</center></div>
                       @endif
                </div>
                <div class="col-lg-2 col-12"></div>
                        <div class="container-fluid">
            <div class="row">
                <div class="col-2 col-lg-2"></div>
                <div class="cart-items col-lg-8 col-12">
                    @if($orders->count() > 0)
                    <h4><center><b>Order Status</b></center></h4>
<table class="table table-striped" style="background-color:white;">
  <thead>
    <tr>
      <th scope="col">Status</th>
      @if($orders->orderdata)<th scope="col">Your Delievery</th>@endif
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$orders->status}}</td>
      @if($orders->orderdata)
       <td>
           @foreach(json_decode($orders->orderdata->designes) as $design)
           <a href="{{url('/laravel/public')}}/uploads/{{$design}}" download>{{$design}}</a>
           @endforeach
           </td>
          @endif
        </tr>
             </tbody>
            </table><br><br>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your do not have any order history</center></div>
                       @endif
                </div>
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>

                </div>
        </div>
    </div>
