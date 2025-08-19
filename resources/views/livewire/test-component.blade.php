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
                  <h3 class="mb-0">Testing - Add Shop Product</h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="{{url('allrproducts')}}" class="btn btn-sm btn-primary">All Shop Products</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data"  wire:submit.prevent="addrproductquery">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Products Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Products Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname" placeholder="productname" wire:model="productname">
                         @error('productname')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Meta Description</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Meta" name="metadesc" wire:model="metadesc">
                        @error('metadesc')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">PKR Price</label>
                        <input type="number" id="input-first-name" class="form-control" placeholder="40 PKR" name="toprice" wire:model="toprice">
                         @error('toprice')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">USD Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50 USD" name="fromprice" wire:model="fromprice"/>
                         @error('fromprice')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                     <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">UAE Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50 UAE" name="fromprice" wire:model="UaeCurrency"/>
                        @error('UaeCurrency')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">PKR Sale Price</label>
                        <input type="number" id="input-first-name" class="form-control" placeholder="40"  wire:model="pkr_sale" />
                        @error('pkr_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">USD Sale Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" name="fromprice" wire:model="usd_sale"/>
                        @error('usd_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">UAE Sale Price</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" name="fromprice" wire:model="uae_sale"/>
                        @error('uae_sale')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">SKU</label>
                        <input type="text" id="input-first-name" class="form-control" value="0" placeholder="40" name="SKU" wire:model="SKU"/>
                         @error('SKU')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Quantity</label>
                        <input type="number" id="input-last-name" class="form-control" placeholder="50" name="quantity" wire:model="quantity"/>
                         @error('quantity')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Stock Status</label>
                        <select name="stock" class="form-control"  wire:model="stock">
                             <option >Select Stock Status</option>
                            <option value="instock">In Stock</option>
                            <option value="outofstock">Out Of Stock</option>
                        </select>
                         @error('stock')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Front Image</label>
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotos"  wire:model="fphotos"/>
                         @error('fphotos')<div class="invalid-feedback">{{$message}}</div>@enderror
                         <img id="preview-image-before-upload" src="" style="width:100px; margin-top:3%" wire:ignore />
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Other Images</label>
                        <input type="file" id="input-file" class="form-control" placeholder="50" name="photos[]" multiple  wire:model="photos"/>
                         @error('photos')<div class="invalid-feedback">{{$message}}</div>@enderror
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
                        <select id="input-address" class="form-control"  name="category" wire:model="category">
                            <option value="" >Select A Category</option>
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
                        <select id="input-address" class="form-control"  name="subcategory" wire:model="subcategory">
                            <option value="" >Select A Category</option>
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
                    @if(isset($inputs))
                    @foreach($inputs as $key => $value)
                    <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label class="form-control-label" for="input-att-name">{{$product_attributes->where('id', $attribute_arr[$key])->first()->name}}</label>
                        <input type="text" class="form-control" placeholder="{{$product_attributes->where('id', $attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}" />
                      </div>
                    </div>
                      <div class="col-md-3">
                        <button type="button" class="btn btn-danger" style="margin-top:14%" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                 </div>
                    @endforeach
                    @endif
                    <br>
                     
                                    <!-- Description -->
               <center><button class="btn btn-sm btn-lg btn-primary" >Add Product</button></center> 
                           <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Description</label>
                    <textarea rows="14" class="form-control " id="editorr" data-editorr="@this" placeholder="A few words about you ..." name="desc" wire:model="desc"></textarea>
                  </div>
                </div> 
                 @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                <hr class="my-4" />
               @if(isset($this->variations))
                      <?php $outer_key = 1; ?>
                       @foreach($this->variations as $keys=>$value_variations)
                    @if(isset($this->attribute_values))
                    <div class="row">
                     <?php $i=1; ?>
                    @foreach($this->attribute_values as $key=>$value)
                    <?php $i++; ?>
                    <div class="col-md-3">
                    {{$product_attributes->where('id', $key)->first()->name}}
                    <select class="form-control" wire:model="variation_array.{{$value_variations}}.{{$key}}">
                        <!-- {{$product_attributes->where('id', $key)->first()->name}} -->
                        @if(isset($this->variation_array[$key]))
                        <option>{{$this->variation_array[$key]}}</option>
                        @endif
                        <option value="">NO Value</option>
                        @foreach(explode(",", $value) as $single_value)
                        <option>{{$single_value}}</option>
                        @endforeach
                    </select>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <br>
                 <div class="col-md-6">
                  <input type="number" value="0" class="form-control" wire:model="variation_array.{{$value_variations}}.price" />
                   </div>
                        <div class="col-md-6">
                  <button type="button" class="btn btn-danger" style="margin-top:4%" wire:click.prevent="removevar({{$keys}})">Remove</button>
                 </div>
                  </div>
                  </div>
                    @endif 
                    <?php $outer_key ++; ?>
                    @endforeach
                    <button type="button" class="btn btn-success" style="margin-top:14%" wire:click.prevent="addvariation('A{{$outer_key}}')">Add Variation</button>
                    @endif
                    {{print_r($this->variation_array)}}
                     {{print_r($this->variation_value)}}
                      {{print_r($this->variations)}}
                        {{print_r($this->attribute_values)}}
                      
              </form>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  </main>