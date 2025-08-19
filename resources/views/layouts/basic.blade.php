<html>
    <head>
    <title>Done</title>
    @livewireStyles
    </head>
    <body>
        <h2>Hello</h2>
        <?php $post= ['title' => 'This Is Post title', 'price'=>'this is price'];  $slug = 'mian-mug' ?> 
         @livewire('test-component', ['post' => $post, 'slug'=>$slug])
    </body>
    @livewireScripts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
 <script>
                        ClassicEditor
                                .create( document.querySelector( '#editorr' ) )
                                .then( editor => {
                                       editor.model.document.on('change:data', ()=>{
                                          let editorr = $('#editorr').data('editorr');
                                       // console.log($('#editor').val());
                                        eval(editorr).set('editorr', editor.getData());
                                        });
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
</html>