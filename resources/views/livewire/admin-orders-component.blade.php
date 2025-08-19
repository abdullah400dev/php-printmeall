  <div class="container-fluid mt--6">
              <div class="row">
        <div class="col-xl-12">
          <div class="card" style="border:2px solid black;">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">All Orders</h3>
                    @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
 {{Session::get('success')}}
</div>
@endif
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Orders</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Total</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>ZipCode</th>
                <th>Satus</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $quote)
            <tr>
                 <td>{{$quote->id}}</td>
                <td>{{$quote->subtotal}}</td>
                <td>{{$quote->discount}}</td>
                <td>{{$quote->tax}}</td>
                <td>{{$quote->total	}}</td>
                <td>{{$quote->firstname}}</td>
                <td>{{$quote->lastname}}</td>
                <td>{{$quote->mobile}}</td>
                <td>{{$quote->email	}}</td>
                <td>{{$quote->zipcode}}</td>
                <td>{{$quote->status}}</td>
                 <td>{{$quote->created_at}}</td>
                 <td><a href="/orderdetails/{{$quote->id}}"><i class="fas fa-eye"></i></a></td>
                 <td>
                     @if($quote->vendor == null)
                     <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Status
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{$quote->id}}, 'delivered')">Delivered</a>
    <a class="dropdown-item" href="#"  wire:click.prevent="updateStatus({{$quote->id}}, 'cancelled')">Cancelled</a>
  </div>
</div>
@else
Status will be chnage by vendor/designer
@endif
</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
             <tr>
                 <th>Order Id</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Total</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>ZipCode</th>
                <th>Satus</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
        </tfoot>
    </table>
            </div>
          </div>
        </div>
      </div>