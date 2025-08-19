@extends('layouts.app2')

@section('styles')
           <title>Update Gig - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')

 <div class="cart-content">
        <div class="container-fluid">
         <main>
        <style>.invalid-feedback {display:inline-block;}</style>
    <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; padding-top:1%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Service </h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                </div>
              </div>
            </div>
            <div class="card-body">
                         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                @foreach($products as $product)
              <form method="POST" enctype="multipart/form-data" action="{{url('updatergigquery')}}" onsubmit="return confirm('Do you really want to update service?');" >
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Service Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                          <input type="hidden" value="{{$product->id}}" name="pid" />
                        <label class="form-control-label" for="input-username"> Gig Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname"  value="{{$product->name}}" placeholder="Gig Name" wire:model ="productname" required>
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
                     <div class="col-lg-12">
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

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Front Image</label>
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotoss" wire:model="fimages" />
                      <?php $fimages = null; ?>
                        @if($fimages)
                        <br>
                        <img src="{{ $fimages->temporaryUrl() }}" style="width:120px; height:120px"/>
                        @else
                        <img src="{{url('/')}}/storage/app/images/{{$product->image}}" style="width:120px; height:120px" />
                        @endif
                      </div>
                    </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Other Images</label>
                        <input type="file" id="input-file" class="form-control" placeholder="50" name="photos[]" multiple wire:model="Imgphotos"/>
                      </div>
                      <div class="row">
                           <?php $Imgphotos = null; ?>
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
         @if($product->images)
                     @foreach(json_decode($product->images) as $key => $OldImg)
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
                     <center><button class="btn btn-sm btn-lg btn-primary">Update Your Gig</button></center>

                <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Description</label>
                    <textarea rows="14" class="form-control " id="editorr"  placeholder="A few words about you ..." name="desc" wire:model="desc">{{$product->description}}</textarea>
                    @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                  </div>
                </div>
                  <hr class="my-4" />

               </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
</main>
        </div>
    </div>
@endsection
