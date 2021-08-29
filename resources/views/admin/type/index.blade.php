@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
@can('admin.type.create')
    <a href="{{ route('admin.type.create') }}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Agregar tipo de apuesta</a>
@endcan
    <h1>Lista de tipos de apuestas</h1>
@stop

@section('content')

    <div class="container">
            @if (session('info'))
                <div class="alert alert-success">
                    <strong>{{session('info')}}</strong>
                </div>
            @endif
        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>identificador</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Condiciones</th>
                                <th>Porcentage</th>
                                @can('admin.type.edit')
                                <th>Editar </th>
                                @endcan
                                @can('admin.type.destroy')
                                <th>Eliminar </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td width="20px">{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                    <td>{{$type->description}}</td>
                                    <td>{{$type->condition}}</td>
                                    <td>{{$type->percentage}}</td>
                                    @can('admin.type.edit')
                                    <td >
                                        <a href="{{ route('admin.type.edit', $type) }}"  class="btn btn-success btn-sm" type="button"><i class="far fa-edit"></i> Editar</a>
                                    </td>
                                    @endcan
                                    @can('admin.type.destroy')
                                    <td >
                                        <form action="{{ route('admin.type.destroy', $type) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i> Eliminar</button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
