@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->
  
<style>
    .form-control{
        border: 1px solid;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').dataTable( {
  "ordering": false
} );
} );
</script>
    <!-- Page content -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-color: #5e72e4 !important; background-size: cover; background-position: center top; padding-top:10%">
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">All Used Credits </h3>
                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                  {{Session::get('success') }}
                 </div>
                  @endif
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Used Credits</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quote as $quote)
            <tr>
                <td>{{$quote->order_id}}</td>
                <td>{{$quote->amount}} {{$quote->currency}}</td>
                <td>{{status($quote->status)}}</td>
                <td>{{$quote->created_at}}</td>
                <td><a href="{{ url('ordercredits/')}}/{{$quote->id}}"><i class="fas fa-eye"></i></a></td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
             <tr>
                <th>Order Id</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>
            </div>
          </div>
        </div>
      </div>

    </div></div>
  </div>
  <!-- Argon Scripts -->
    <!-- Argon Scripts -->
@endsection