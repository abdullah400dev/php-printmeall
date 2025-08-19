   <div class="cart-content">
        <div class="cart-heading">
            <p>My Cart</p>
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cart-items col-lg-8 col-12">
                    @if(Cart::count() > 0)
                    @foreach(Cart::content() as $item)
                    <div class="cart-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="item-detail col-md-5 col-12">
                                    <div class="item-image">
                                        <img src="{{url('/')}}/storage/app/images/{{$item->model->image}}" alt="">
                                    </div>
                                    <div class="item-name">
                                        <p>{{ $item->name }}</p>
                                        @foreach($item->options as $key => $value)
                                        <div class="item-disc">
                                            @if($key=='image')
                                            <p>File: &nbsp;</p>
                                            <p>{{substr($value, strpos($value, "_") + 1)}}</p>
                                            @else
                                            @if(isset($product_attributes->where('id', $key)->first()->name))
                                            <p>{{$product_attributes->where('id', $key)->first()->name}}: &nbsp;</p>
                                            <p>{{$value}}</p>
                                              @else
                                              <p>{{$key}}: &nbsp;</p>
                                            <p>{{$value}}</p>
                                                @endif
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="item-price col-md-2 col-4">
                                    <p>{{ $this->currency }}. {{ $item->price }} </p>
                                </div>
                                <div class="item-count col-md-3 col-4">
                                    <button wire:click.prevent="cartDecrement('{{$item->rowId}}')">-</button> <span>{{ $item->qty }}</span> <button wire:click.prevent="cartIncrement('{{$item->rowId}}')">+</button>
                                </div>
                                <div class="item-delete col-md-2 col-4">
                                    <button wire:click.prevent="deleteItem('{{$item->rowId}}')">Remove</button>
                                </div>
                            </div>
                        </div>

                    </div>
                       @endforeach
                       <div class="checkout-button" style="text-align: left !important;">
                        <button wire:click.prevent="deleteAll()">Empty Cart</button> <a href="/shop/"><button>Continue Shopping</button></a>
                    </div>
                       @else
                  <div class="alert alert-info" role="alert"><center>Your Cart Is Empty</center></div>
                       @endif
                </div>
                <div class="summary col-lg-4 col-12">
                    <div class="sub-total summary-amount">
                        <p>Subtotal({{Cart::count()}} items)</p>
                        <p>{{ $this->currency }}. {{Cart::subtotal()}}</p>
                    </div>
                    <div class="Total summary-amount">
                        <p>Total</p>
                        <p>{{ $this->currency }}. {{Cart::total()}}</p>
                    </div>
                   @if(Cart::count() > 0)
                    <div class="checkout-button">
                        <a href="#!" wire:click.prevent="checkout()"><button>Proceed to checkout</button></a>
                    </div>
                   @endif
                </div>

            </div>
        </div>
    </div>
