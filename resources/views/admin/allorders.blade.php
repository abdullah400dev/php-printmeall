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
    $('#example1').DataTable({
        'ordering':false;
    });
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
        @livewireStyles
   @livewire('admin-orders-component')
     
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
    @livewireScripts
@endsection