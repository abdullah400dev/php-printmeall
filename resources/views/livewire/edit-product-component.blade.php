<main>
        <style>.invalid-feedback {display:inline-block;}</style>
    <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-color: #5e72e4 !important; background-size: cover; background-position: center top; padding-top:10%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Product </h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                @foreach($products as $product)
              <form method="POST" enctype="multipart/form-data" wire:submit.prevent="updaterproductquery">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Products Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                          <input type="hidden" value="{{$product->id}}" name="pid" />
                        <label class="form-control-label" for="input-username">Products Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname"  placeholder="productname" wire:model ="productname" required>
                        @error('productname')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Meta Description</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Meta" value="{{$product->metades}}" name="metadesc" wire:model="metadesc" required>
                          @error('metadesc')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">PKR Price</label>
                        <input type="number" id="input-first-name" class="form-control" placeholder="40" value="{{$product->regular_price}}" wire:model="toprice" required/>
                        @error('toprice')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">USD Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" value="{{$product->sale_price}}" name="fromprice" wire:model="fromprice" required/>
                        @error('fromprice')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">UAE Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" value="{{$product->UaeCurrency}}" name="fromprice" wire:model="UaeCurrency" required/>
                        @error('UaeCurrency')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">PKR Sale Price</label>
                        <input type="number" id="input-first-name" class="form-control" placeholder="40" value="{{$product->pkr_sale}}" wire:model="pkr_sale" required/>
                        @error('pkr_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">USD Sale Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" value="{{$product->usd_sale}}" name="fromprice" wire:model="usd_sale" required/>
                        @error('usd_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">UAE Sale Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" value="{{$product->uae_sale}}" name="fromprice" wire:model="uae_sale" required/>
                        @error('uae_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">SKU</label>
                        <input type="text" id="input-first-name" class="form-control" value="{{$product->SKU}}" placeholder="40" name="SKU" wire:model="SKU" required/>
                        @error('SKU')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Quantity</label>
                        <input type="number" id="input-last-name" value="{{$product->quantity}}" class="form-control" placeholder="50" name="quantity" wire:model="quantity" required/>
                         @error('quantity')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Weight</label>
                        <input type="number" id="input-last-name" value="{{$product->weight}}" class="form-control" placeholder="50" name="quantity" wire:model="weight" />
                         @error('quantity')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Stock Status</label>
                        <select name="stock" class="form-control" wire:model="stock" required>
                            <option value="{{$product->stock_status}}">{{$product->	stock_status}}</option>
                            <option value="instock">In Stock</option>
                            <option value="outofstock">Out Of Stock</option>
                        </select>
                        @error('stock')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product URL</label>
                        <input type="text" id="input-last-name" value="{{$product->slug}}" class="form-control" placeholder="50" name="slug" wire:model="slug" required/>
                        @error('slug')<div class="invalid-feedback">{{$message}}</div>@enderror
                     </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Category</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Select Primary Category</label>
                        <select id="input-address" class="form-control"  name="category" wire:model="category" required>
                             @if($product->category_id)
                             <option value="{{$product->category_id}}" >{{$product->pcategory->name}}</option>
                             @endif
                            @foreach($cat as $cat)
                             <option value="{{$cat->id}}" >{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Select Secondary Category</label>
                        <select id="input-address" class="form-control"  name="subcategory" wire:model="subcategory" required>
                             @if($product->subcategory_id)
                         <option value="{{$product->subcategory_id}}" >{{$product->rsubcategory->name}}</option>
                              @endif
                            @foreach($subcat as $subcat)
                             <option value="{{$subcat->id}}" >{{$subcat->name}}</option>
                            @endforeach
                        </select>
                         @error('subcategory')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                </div>
                 <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Attributes</h6>
                <div class="row">
                <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Select Product Attributes</label>
                        <select class="form-control"  wire:model="attr">
                            <option value="0" >Select A Product Attribute</option>
                            @foreach($product_attributes as $product_attribute)
                             <option value="{{$product_attribute->id}}" >{{$product_attribute->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-success" style="margin-top:14%" wire:click.prevent="add">Add</button>
                    </div>
                    </div>
                    @foreach($inputs as $key => $value)
                    <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label class="form-control-label" for="input-att-name">{{$product_attributes->where('id', $attribute_arr[$key])->first()->name}}</label>
                        <input type="text" class="form-control" placeholder="{{$product_attributes->where('id', $attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}" required/>
                      </div>
                    </div>
                      <div class="col-md-3">
                        <button type="button" class="btn btn-danger" style="margin-top:14%" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                 </div>
                    @endforeach
                    <br>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Front Image</label>
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotoss" wire:model="fimages" />

                        @if($fimages)
                        <br>
                        <img src="{{ $fimages->temporaryUrl() }}" style="width:120px; height:120px"/>
                        @else
                        <img src="{{url('/')}}/storage/app/images/{{$fphotos}}" style="width:120px; height:120px" />
                        @endif
                      </div>
                    </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Other Images</label>
                        <input type="file" id="input-file" class="form-control" placeholder="50" name="photos[]" multiple wire:model="Imgphotos"/>
                      </div>
                      <div class="row">
                            @if($Imgphotos)
                        <br>
                        @foreach($Imgphotos as $Imgphts)
    <div class="col-sm-4">
        <div class="clone">
          <div class="control-group form-group" style="margin-top:10px">
                        <img src="{{ $Imgphts->temporaryUrl() }}" style="width:120px; height:120px"/>
            <div class="input-group-btn">
              <button class="btn btn-danger" type="button" wire:click.prevent="removeImg({{$loop->index}})"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
</div>
                       @endforeach
                        @endif
         @if($OldImages)
                     @foreach($OldImageArray as $key => $OldImg)
                 <div class="col-sm-4">
        <div class="clone">
          <div class="control-group form-group" style="margin-top:10px">
            <img src="{{url('/')}}/storage/app/images/{{$OldImg}}" width="100px" />
            <input type ="hidden" value="" name="OldImages[]" multiple wire:model="OldImages"/>
            <div class="input-group-btn">
              <button class="btn btn-danger" type="button" wire:click.prevent="removeOldImg({{$key}})"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
        </div>
        @endforeach
    @endif
        </div>
                    </div>
                     <center><button class="btn btn-sm btn-lg btn-primary">Update Product</button></center>

                <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Description</label>
                    <textarea rows="14" class="form-control " id="editorr" data-editorr="@this" placeholder="A few words about you ..." name="desc" wire:model="desc">{{$product->description}}</textarea>
                    @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                </div>
                  <hr class="my-4" />
               @if(isset($this->variations))
                      <?php $outer_key = 1; ?>
                      <div id="accordion">
                       @foreach($this->variations as $keys=>$value_variations)
                     <div class="card">
    <div class="card-header" id="headingThree{{$outer_key}}">
      <h5 class="mb-0">
        <span class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree{{$outer_key}}" aria-expanded="false" aria-controls="collapseThree">
         Variation # 0{{$outer_key}}
        </span>
      </h5>
    </div>
    <div id="collapseThree{{$outer_key}}" class="colapse" aria-labelledby="headingThree{{$outer_key}}" data-parent="#accordion">
      <div class="card-body">
                    @if(isset($this->attribute_values))
                    <div class="row">
                     <?php $i=1; ?>
                    @foreach($this->attribute_values as $key=>$value)
                    <?php $i++; ?>
                    <div class="col-md-3">
                    {{$product_attributes->where('id', $key)->first()->name}}
                    <select class="form-control" wire:model="variation_array.{{$value_variations}}.{{$key}}" required>
                        <!-- {{$product_attributes->where('id', $key)->first()->name}} -->
                        @if(isset($this->variation_array[$key]))
                        <option>{{$this->variation_array[$key]}}</option>
                        @endif
                        <option value="">No Value</option>
                        @foreach(explode(",", $value) as $single_value)
                        <option>{{$single_value}}</option>
                        @endforeach
                    </select>
                    </div>
                    @endforeach
                    <div class="col-md-12"><br><br>
                        <div class="row">
                 <div class="col-md-4">
                      <label class="form-control-label" for="input-last-name">PKR Price</label>
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.price" required/>
                   </div>
                   <div class="col-md-4">
                       <label class="form-control-label" for="input-last-name">USD Price</label>
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.usd_price" required/>
                   </div>
                   <div class="col-md-4">
                       <label class="form-control-label" for="input-last-name">UAE Price</label>
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.uae_price" required/>
                   </div>
                   </div>
                   <br><br>
                        <div class="row">
                 <div class="col-md-4">
                      <label class="form-control-label" for="input-last-name">PKR Sale Price</label>
                  <input type="number" class="form-control" wire:model="variation_array.{{$value_variations}}.sale_price" required/>
                   </div>
                   <div class="col-md-4">
                       <label class="form-control-label" for="input-last-name">USD Sale Price</label>
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.usd_sale_price" required/>
                   </div>
                   <div class="col-md-4">
                       <label class="form-control-label" for="input-last-name">UAE Sale Price</label>
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.uae_sale_price" required/>
                   </div>
                   </div>
                  </div>
                   <div class="col-md-5">
                  <button type="button" class="btn btn-danger" style="margin-top:4%" wire:click.prevent="removevar({{$keys}})">Remove</button>
                 </div>
                  </div>
                    @endif
                    <?php $outer_key ++; ?>
                    </div>
    </div>
  </div>
                    @endforeach
                    </div>
                    <button type="button" class="btn btn-success" style="margin-top:2%" wire:click.prevent="addvariation('A{{$outer_key}}')">Add Variations</button>
                    @endif
               </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
</main>
