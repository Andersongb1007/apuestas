@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar deporte</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($sport,['route' => ['admin.sports.update',$sport],'method'=>'put']) !!}
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
                {!! Form::submit('Actualizar deporte', ['class'=> 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
