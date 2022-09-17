@extends('layouts.app')

@section('content')
<div class="py-3"></div>
<div class="col-md-6 mx-auto">
   @if (session('info'))
      <div class="alert alert-success">
         <strong>{{session('info')}}</strong>
      </div>
   @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($guia, ['route' => ['guia.update', $guia], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('guia.partials.form')

            {!! Form::submit('Editar guía', ['class' => 'btn btn-primary']) !!}


         {!! Form::close() !!}
      </div>
   </div>
</div>

@endsection

@section('css')
   <style>
      .image-wrapper{
         position: relative;
         padding-bottom: 56.25%;

      }

      .image-wrapper{
         position: absolute;
         object-fit: cover;
         width: 100%;
         height: 100%;
      }


      .ck {
         height: 300px;
      }

   </style>
@endsection

@section('js')
   <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
   <script>

      document.getElementById('file').addEventListener('change', cambiarImagen);

      function cambiarImagen(){
         console.log('red')
         var file = event.target.files[0];
         var reader = new FileReader();
         
         reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result);
         };

         reader.readAsDataURL(file);
      }

      function loadPreview(input, id) {
         console.log('hello')
         
         id = id || '#picture';
         if (input.files && input.files[0]) {
            var reader = new FileReader();
      
            reader.onload = function (e) {
                  $(id)
                        .attr('src', e.target.result)
            };
      
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
@endsection