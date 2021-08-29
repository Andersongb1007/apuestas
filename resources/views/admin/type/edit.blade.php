@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar tipo de apuesta</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($type,['route' => ['admin.type.update',$type],'method'=>'put']) !!}

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

                <div class="form-group">
                        {!! Form::label('condition', 'Condición para ganar la apuesta') !!}
                        {!! Form::textarea('condition', null, ['class' => 'form-control', 'placeholder' => 'Condición para ganar la apuesta']) !!}
                            @error('condition')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Descripcion del Tipo de apuesta') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del tipo de apuesta']) !!}
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>
                    <div class="form-group">
                    {!! Form::label('percentage', 'Descripcion del Tipo de apuesta') !!}
                    <div class=" input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                            {!! Form::number('percentage', null, ['class' => 'form-control', 'placeholder' => 'Porcentage de ganancia del tipo de apuesta']) !!}
                                @error('percentage')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                    </div>
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
    <script> console.log('Hi!'); </script>
@stop
