@extends('layouts.app3')

@section('content')
  <!-- Sidenav -->

<style>
    .form-control{
        border: 1px solid;
    }
</style>
    @livewireStyles
   @livewire('edit-product-component', ['pid' => $products->id])
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script>
                        ClassicEditor
                                .create( document.querySelector( '#editorr' ) )
                                .then( editor => {
                                       editor.model.document.on('change:data', ()=>{
                                          let editorr = $('#editorr').data('editorr');
                                       // console.log($('#editor').val());
                                        eval(editorr).set('desc', editor.getData());
                                        });
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
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
  <!-- Argon Scripts -->
    <!-- Argon Scripts -->
      @livewireScripts
@endsection