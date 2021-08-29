@extends('adminlte::page')
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

@section('title', 'Admin')

@section('content_header')
    <h1>Crear deporte</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">


                    {!! Form::open(['route' => 'admin.sports.store']) !!}
                    <div class="form-group">
                        {!! form::label('name', 'Nombre')!!}
                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre del deporte']) !!}

                        @error('name')

                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! form::label('slug', 'Slug')!!}
                        {!! Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre del slug','readonly']) !!}

                        @error('slug')

                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {!! Form::submit('Crear deporte', ['class'=> 'btn btn-primary']) !!}
                    {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')


    <script src="{{asset('./vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents:'keyup keydown blur',
                getPut: '#slug',
                space:'-'
            });
        });
    </script>
@stop
