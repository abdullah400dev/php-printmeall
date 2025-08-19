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
              <form method="POST" enctype="multipart/form-data" wire:submit.prevent="updaterproductquery">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Products Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                          <input type="hidden" value="{{$product->id}}" name="pid" />
                        <label class="form-control-label" for="input-username">Products Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname"  placeholder="productname" wire:model ="productname">
                        @error('productname')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Meta Description</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Meta" value="{{$product->metades}}" name="metadesc" wire:model="metadesc">
                          @error('metadesc')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">SKU</label>
                        <input type="text" id="input-first-name" class="form-control" value="{{$product->SKU}}" placeholder="40" name="SKU" wire:model="SKU"/>
                        @error('SKU')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Quantity</label>
                        <input type="number" id="input-last-name" value="{{$product->quantity}}" class="form-control" placeholder="50" name="quantity" wire:model="quantity"/>
                         @error('quantity')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Weight</label>
                        <input type="number" id="input-last-name" value="{{$product->weight}}" class="form-control" placeholder="50" name="quantity" wire:model="weight"/>
                         @error('quantity')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Stock Status</label>
                        <select name="stock" class="form-control" wire:model="stock">
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
                        <input type="text" id="input-last-name" value="{{$product->slug}}" class="form-control" placeholder="50" name="slug" wire:model="slug"/>
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
                        <select id="input-address" class="form-control"  name="category" wire:model="category">
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
                        <select id="input-address" class="form-control"  name="subcategory" wire:model="subcategory" >
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


                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Front Image</label>
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotoss" wire:model="fimages"/>

                        @if($fimages)
                        <br>
                        <img src="{{ $fimages->temporaryUrl() }}" style="width:120px; height:120px"/>
                        @else
                        <img src="{{url('/')}}/storage/app/images/{{$fphotos}}" style="width:120px; height:120px"/>
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
                    <br><br>
                     <center><button class="btn btn-sm btn-lg btn-primary">Update Product</button></center>
                      <br><br>
              <!-- <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Short Description</label>
                    <textarea rows="14" class="form-control " id="seditorr" data-seditorr="@this" placeholder="A few words about you ..." name="sdesc" wire:model="sdesc">{{$product->description}}</textarea>
                    @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                </div> -->
                <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Description</label>
                    <textarea rows="14" class="form-control " id="editorr" data-editorr="@this" placeholder="A few words about you ..." name="desc" wire:model="desc">{{$product->description}}</textarea>
                    @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                </div>

                  @foreach($feilds_values as $key => $value)
                    <div class="row">
                    <div class="col-md-3">
                       <div class="form-group">
                        <input type="text" class="form-control" placeholder="Add Feild Name" wire:model="feilds_values.{{$key}}.name" required/>
                      </div>
                    </div>
                     <div class="col-md-3">
                    <select class="form-control" wire:model="feilds_values.{{$key}}.feild" required>
                        <option value="">Select Your Feilds</option>
                        <option value="1">Number</option>
                        <option value="2">Input</option>
                        <option value="3">Dropdown</option>
                        <option value="4">Texarea</option>
                    </select>
                     </div>
                   @if(isset($feilds_values[$key]['feild']) && $feilds_values[$key]['feild']==3)
                     <div class="col-md-3">
                       <div class="form-group">
                        <input type="text" class="form-control" placeholder="Add Dropdown Values" wire:model="feilds_values.{{$key}}.values" required/>
                      </div>
                    </div>
                    @endif
                      <div class="col-md-3">
                        <button type="button" class="btn btn-danger" wire:click.prevent="removeformfeild({{$key}})">Remove</button>
                    </div>
                 </div>
                    @endforeach
                     <br>
                     <div class="col-md-3">
                        <button type="button" class="btn btn-success" style="margin-top:14%" wire:click.prevent="addformfeilds">Add New Form Feild</button><span style="display:none">{{$formids = $key+1}}</span>
                    </div>
               </form>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
</main>
