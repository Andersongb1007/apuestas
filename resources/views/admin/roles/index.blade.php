@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Agregar nuevo rol</a>
    <h1>Lista de roles</h1>
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

                                <th>Editar </th>
                                <th>Eliminar </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td width="20px">{{$role->id}}</td>
                                    <td>{{$role->name}}</td>


                                    <td >
                                        <a href="{{ route('admin.roles.edit', $role) }}"  class="btn btn-success btn-sm" type="button"><i class="far fa-edit"></i> Editar</a>
                                    </td>


                                    <td >
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i> Eliminar</button>
                                        </form>
                                    </td>

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
