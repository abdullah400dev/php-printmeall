@extends('layouts.app2')

@section('styles')
           <title>Vendor Details - PrintMeAll</title>
            <meta name="description" content="About Us - PrintMeAll">
<link rel="stylesheet" href="{{ asset('css/product.css')}}" />
<link rel="stylesheet" href="{{ asset('css/venderform.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@stop
@section('scripts')
<script src="{{asset('js/index.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function(){
        $('.multiple_dropdown').selectpicker();
    });
</script>

@stop
@section('content')

    <div class="form-page">
        <div class="form-top">
            <p>Vendor Details</p>
        </div>
<div class="cart-content">
        <div class="cart-heading">
            <p></p>
            @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert">
           {{ Session::get('success_message') }}</div>
            @endif
            
            @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
           {{ Session::get('fail') }}</div>
            @endif
        </div>
    </div>
        <div class="form">
            <form action="{{url('updatevendordata')}}" method="post">
                @csrf
                <div class="personal-information information">
                    <div class="information-top">
                        <p>Personal Information</p>
                    </div>
                    <div class="personal-fields">
                        <div class="input-control">
                            <label for="">Press Name</label>
                            <input type="text" placeholder="Press Name" @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->pressname}}" @endif name="pressname" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Manager First Name</label>
                            <input type="text" placeholder="Manager Name" value="{{Auth::user()->name}}" name="managername" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Email Address</label>
                            <input type="email" placeholder="example@gmail.com" value="{{Auth::user()->email}}" name="email" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Phone Number</label>
                            <input type="tel" placeholder="0900-78601" @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->phonenum}}" @endif name="phonenum" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Location</label>
                            <input type="text" placeholder="Enter Your Location" @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->location}}" @endif  name="location" required/>
                        </div>
                    </div>
                </div>
                <div class="bank-information information">
                    <div class="information-top">
                        <p>Bank Information</p>
                    </div>
                    <div class="bank-fields">
                        <div class="input-control">
                            <label for="">Recipient Name</label>
                            <input type="text" placeholder="Recipient Name" @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->account_holdername}}" @endif name="rec_name" required/>
                        </div>
                        <div class="input-control">
                            <label for="">Bank Name</label>
                            <input type="text" placeholder="Bank Name" name="bank_name"  @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->bank_name}}" @endif required/>
                        </div>
                        <div class="input-control">
                            <label for="">Account Number</label>
                            <input type="tel" placeholder="9832 9832 8732 3287" name="account_number" @if(Auth::user()->vendordata) value="{{Auth::user()->vendordata->account_num}}" @endif required/>
                        </div>
                    </div>
                </div>
                <div class="service-information information">
                    <div class="information-top">
                        <p>Service Information</p>
                    </div>
                    <div class="service-fields">
                        <div class="input-control">
                            <label for="">Products Types</label>
                            @php 
                           $machine_types = array('Solna 125 Single Color', 'Solna 225 Single Color', 'Heidelberg GTO', 'Heidelberg 1 color' , 'Heidelberg 2 color', 'Heidelberg 4 color', 'Rota');
                            
                            $old_machines_types = Auth::user()->vendordata->machines_types;
                            $old_machines_types = json_decode($old_machines_types, true);
                            
                             $old_product_types = Auth::user()->vendordata->product_types;
                            $old_product_types = json_decode($old_product_types, true);
                            @endphp
                      <select class="multiple_dropdown" name="product_types[]" title="Choose multiple..." data-actions-box="true" data-live-search="true" multiple required>
                        <option ></option>
                                              <?php
$rcategories = \App\RSubCategories::all();
?>
                        @foreach($rcategories as $product_type)
                        <option @if(in_array($product_type->name, $old_product_types))
                    selected
  @endif >{{$product_type->name}}</option>
  @endforeach
                  </select>
                        </div>
                        <div class="input-control">
                            <label for="">Machine Types</label>
                             <select class="multiple_dropdown" name="machine_types[]" title="Choose multiple..." data-actions-box="true" data-live-search="true" multiple required>
                        <option> </option>
                        @foreach($machine_types as $machine_type)
                        <option @if(in_array($machine_type, $old_machines_types))
                    selected
@endif >{{$machine_type}}</option>
                        @endforeach
                  </select>
                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection