@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar roles</h1>
@stop

@section('content')
    @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
    <div class="card">
            <div class="card-header">
                <h5>Editar rol</h5>
            </div>

        <div class="card-body">


                    {!! Form::model($role,['route' => ['admin.roles.update',$role],'method'=>'put']) !!}
                    <div class="form-group">
                        {!! form::label('name', 'Nombre')!!}
                        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre del deporte']) !!}

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="h5">Lista de Permisos</div>
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                                {{$permission->description}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Actualizar rol', ['class'=> 'btn btn-primary']) !!}
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
