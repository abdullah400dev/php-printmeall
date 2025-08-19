@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->
    <script src="https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
   <script>
            CKEDITOR.replace( 'editor' );
        </script>
<style>
    .form-control{
        border: 1px solid;
    }
</style>
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
              <form action="{{ url('updateproductquery') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Products Info</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                          <input type="hidden" value="{{$product->id}}" name="pid" />
                        <label class="form-control-label" for="input-username">Products Name</label>
                        <input type="text" id="input-username" class="form-control" name="productname" value="{{$product->name}}" placeholder="productname" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Meta Description</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Meta" value="{{$product->metades}}" name="metadesc" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">To Price</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="40" value="{{$product->to_price}}" name="toprice" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">From Price</label>
                        <input type="text" id="input-last-name" class="form-control" placeholder="50" value="{{$product->from_price}}" name="fromprice" required/>
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
                        <select id="input-address" class="form-control"  name="category" required>
                            <option value="{{$product->category->id}}" >{{$product->category->name}}</option>
                            @foreach($cat as $cat)
                             <option value="{{$cat->id}}" >{{$cat->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                                        <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Select Secondary Category</label>
                        <select id="input-address" class="form-control"  name="subcategory" required>
                            <option value="{{$product->subcategory->id}}" >{{$product->subcategory->name}}</option>
                            @foreach($subcat as $subcat)
                             <option value="{{$subcat->id}}" >{{$subcat->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Product Description</h6>
                                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Front Image</label>
                        <input type="file" id="image" class="form-control" placeholder="50" name="fphotos" value="{{$product->fImg}}"  />
                        <img id="preview-image-before-upload" src="{{$product->fImg}}" style="width:100px; margin-top:3%" />
                      </div>
                    </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Other Images</label>
                        <input type="file" id="input-file" class="form-control" placeholder="50" name="photos[]" multiple />
                      </div>
                      <div class="row">
                 <?php foreach(json_decode($product->Img) as $image){ ?>
                 <div class="col-sm-4">
        <div class="clone">
          <div class="control-group form-group" style="margin-top:10px">
            <img src="<?php echo $image; ?>" width="100px" />
            <input type ="hidden" value="<?php echo $image; ?>" name="OldImages[]" />
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
        </div>
        <?php } ?>
        </div>
                    </div>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Description</label>
                    <textarea rows="4" class="form-control ckeditor" placeholder="A few words about you ..." name="desc"  required>{{$product->des}}</textarea>
                  </div>
                </div> 
               <center><button class="btn btn-sm btn-lg btn-primary">Update Product</button></center> 
              </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>

<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
  <!-- Argon Scripts -->
    <!-- Argon Scripts -->
@endsection
