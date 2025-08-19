@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
 $(document).ready(function() {
    $('#example1').DataTable();
} );
 $(document).ready(function() {
    $('#example2').DataTable();
} );
</script>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
                @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
 {{Session::get('success')}}
</div>
@endif
      <div class="row">
        <div class="col-xl-12">
          <div class="card" style="border:2px solid black;">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">All Custom Products</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Custom Products</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
             @foreach($products->chunk(100) as $products)
            @foreach($products as $quote)
            <tr>
                 <td>{{$quote->id}}</td>
                <td>{{$quote->name}}</td>
                 <td><a href="editcproduct/{{$quote->id}}"><i class="fas fa-edit"></i></a></td>
                  <td><a href="deleteproduct/{{$quote->id}}"><i class="fa fa-trash"></i></a></td>
            </tr>
          @endforeach
           @endforeach
        </tbody>
        <tfoot>
             <tr>
                <th>Id</th>
                <th>Name</th>
                 <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            
            </ul>
          </div>
        </div>
      </footer>
    </div>
  <!-- Argon Scripts -->
@endsection
