@extends('layouts.app2')

@section('styles')
           <title>Add Gig - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/cart.css')}}" />
@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
@stop
@section('content')
<main>
    <style>.invalid-feedback {display:inline-block;}</style>
 <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-size: cover; background-position: center top; padding-top:2%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add New Gig</h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="{{url('gigs')}}" class="btn btn-sm btn-primary">All Gigs</a>
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
              <form method="POST" enctype="multipart/form-data"  action="{{url('addrgigquery')}}" onsubmit="return confirm('Do you really want to add new service?');">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Gig Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Gig Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname" placeholder="Gig Name" wire:model="productname" value="{{ old('productname') }}" required>
                         @error('productname')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Meta Description</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Meta" name="metadesc" value="{{ old('metadesc') }}" wire:model="metadesc" required>
                        @error('metadesc')<div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                    </div>
                  </div>
                   <div class="row">
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Stock Status</label>
                        <select name="stock" class="form-control"  wire:model="stock" required>
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
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotos"  wire:model="fphotos" required/>
                         @error('fphotos')<div class="invalid-feedback">{{$message}}</div>@enderror
                         <img id="preview-image-before-upload" src="" style="width:100px; margin-top:3%" wire:ignore />
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Other Images</label>
                        <input type="file" id="input-file" class="form-control" placeholder="50" name="photos[]" multiple  wire:model="photos" required/>
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
                        <select id="input-address" class="form-control"  name="category" wire:model="category" required>
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
                        <select id="input-address" class="form-control"  name="subcategory" wire:model="subcategory" required>
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
               <center><button class="btn btn-sm btn-lg btn-primary" >Add New Gig</button></center> 
                           <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Gig Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group" wire:ignore>
                    <label class="form-control-label">Description</label>
                    <textarea rows="14" class="form-control " id="editorr"  placeholder="A few words about you ..." name="desc" wire:model="desc" required></textarea>
                  </div> 
                </div> 
                 @error('desc')<div class="invalid-feedback">{{$message}}</div>@enderror
                <hr class="my-4" />
              </form>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  </main>
@endsection