 <div class="cart-content">
       <br><br><br>
        <div class="cart-heading">
            <p>My Wishlist</p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-2 col-12"></div>
                <div class="cart-items col-lg-8 col-12">
                    @if(Cart::instance('wishlist')->count() > 0)
                    @foreach(Cart::instance('wishlist')->content() as $item)
                    <div class="cart-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="item-detail col-md-5 col-12">
                                    <div class="item-image">
                                        <img src="{{url('/')}}/storage/app/images/{{$item->model->image}}" alt="">
                                    </div>
                                    <div class="item-name">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div>
                                <div class="item-delete col-md-2 col-4">
                                    <button><a href="/products/{{ $item->model->slug }}" style="color:white">View Item</a></button>
                                </div>
                                <div class="item-delete col-md-2 col-4">
                                   <button wire:click.prevent="removetowhislist({{$item->model->id}})">Remove</button>
                                </div>
                            </div>
                        </div>

                    </div>
                       @endforeach
                       <div class="checkout-button" style="text-align: left !important;">
                        <button wire:click.prevent="deleteAll()">Empty Whishlist</button>
                    </div>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your Wishlist Is Empty</center></div>
                       @endif
                </div>
                <div class="col-lg-2 col-12"></div>
                </div>
        </div>
    </div>
