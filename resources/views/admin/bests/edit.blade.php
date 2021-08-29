@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar apuesta</h1>
@stop

@section('content')
            @if (session('info'))
                <div class="alert alert-success">
                    <strong>{{session('info')}}</strong>
                </div>
            @endif
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($best,['route' => ['admin.bests.update',$best],'method'=>'put']) !!}

                @include('admin.bests.partials.form')

                {!! Form::submit('Actualizar apuesta', ['class'=> 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;

        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('./vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );

        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents:'keyup keydown blur',
                getPut: '#slug',
                space:'-'
            });
        });

        //cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);

        function cambiarImagen(event){

            var file = event.target.files[0];

            var reader = new FileReader();

            reader.onload = (event) =>{
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

</script>
@stop
