<main>
<div class="product">
    <div class="inner-product">
        <div class="product-top">
            <div class="product-name">
                <p>{{ $products->name }}</p>
            </div>
            @php
            $whishlistsItems = Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            <div class="container-fluid">
                <div class="row">
                   <div class="product-image-col">
                        <!-- Swiper -->

                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                                       <?php
                        foreach(json_decode($products->images) as $image){
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
                        foreach(json_decode($products->images) as $image){
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
                    <div class="variation-col">
                        <div wire:offline>
                        <div class="alert alert-danger" role="alert">
                                  You are Offline
            </div></div>
                            <div class="product-price">
                                <p>{{$currency}}
                                @if($this->oprice)
                                {{$this->price}} (<span style=" text-decoration: line-through;">{{$this->oprice}}</span>)
                                @else
                                  {{$this->price}}
                                @endif
                                </p>
                            </div>
                            <div class="variations">
                                @foreach($products->attributeValues->unique('product_attribute_id') as $av)
                                 <div class="size-dropdown variation">
                                    <label for="{{$av->productValues->name}}">{{$av->productValues->name}} : </label>
                                    <select id="{{$av->productValues->name}}" class="form-select" aria-label="Default select example" wire:model="attr.{{$av->productValues->id}}"  wire:change="change($event.target.value)">
                                        @foreach($products->attributeValues->where('rproduct_id', $products->id)->where('product_attribute_id', $av->productValues->id)->sortBy('value') as $pav)
                                         @if(Str::contains($pav->value, ['[', ']']))
                                           <option value="{{$pav->value}}"><?php echo strtok($pav->value, '['); ?></option>
                                           @else
                                          <option value="{{$pav->value}}">{{$pav->value}}</option>
                                           @endif
                                               @endforeach
                                    </select>
                                </div>
                                @endforeach
                                <div class="upload-image variation">
                                    <label for="">Upload an image :</label>
                                    <input type="file" wire:model="usrimage">
                                </div>
                                 <div class="upload-design">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 col-6 design">
                                                <div class="design-image">
                                                    <img src="{{ asset('images/graphic-design-icon-png-16.jpg') }}" alt="">
                                                </div>
                                                <div class="design-text">
                                                    <p>Design with professional</p>
                                                    <ul>
                                                        <li>order your logo</li>
                                                        <li>customize every detail</li>
                                                    </ul>
                                                </div>
                                                <div class="design-btn">
                                                   <a href="https://inkhornsolutions.com/designerportal/" target="_blank"><button>Design</button></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 upload">
                                                <div class="design-image">
                                                    <img src="{{ asset('images/338864.png') }}" alt=""><br>
                                                </div>
                                                <div class="design-text">
                                                    <p>Upload your design</p>
                                                    <ul>
                                                        <li>Have a complete design</li>
                                                        <li>Have your own design</li>
                                                    </ul>
                                                     @if ($usrimage)
                                                     <div wire:loading.remove="usrimage">
                                                          <p style="color:green">File Uploaded</p>
                                                          </div>
                                                            @endif
                                                </div>
                                                <div class="design-btn">
                                                    <label class="btn-designs custom-file-upload">
                                                     <input type="file" wire:model="usrimage" /> Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class=" variation">
                                    <label for="">Quantity : </label>
                                    <div class="product-counter">
                                        <button>-</button><span>1</span><button>+</button>
                                    </div>
                                </div> -->
                                  <div wire:loading wire:target="usrimage">
                                  <div class="alert alert-primary" role="alert">
                                      Uploading File...
                                       </div>
                                </div>
                                <div class="cart-btn"  wire:loading.remove>
                                     <button wire:click.prevent="addtocart({{$products->id}} , '{{$products->name}}', {{$this->price}})"><i class="fas fa-cart-plus" ></i> &nbsp; Add to cart</button>
                                    &nbsp;&nbsp;
                                    @if($whishlistsItems->contains($products->id))
                                     <button wire:click.prevent="removetowhislist({{$products->id}})"><span style="color:red"><i class="fas fa-heart" ></i></span>&nbsp; Add to Wishlist</button>
                                    @else
                                    <button wire:click.prevent="addtowhislist({{$products->id}} , '{{$products->name}}', {{$this->price}})"><i class="fas fa-heart" ></i> &nbsp; Add to Wishlist</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end-->

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
                            {!! $products->description !!}
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
      <td>Default Process</td>
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
    </main>
