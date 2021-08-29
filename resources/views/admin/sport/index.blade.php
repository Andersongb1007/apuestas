@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <a href="{{ route('admin.sports.create') }}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Agregar tipo de apuesta</a>

    <h1>lista de deportes</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th>identificador</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sports as $sport)
                            <tr>
                                <td>{{$sport->id}}</td>
                                <td >{{$sport->name}}</td>

                                    <td width="10px">
                                        <a href="{{ route('admin.sports.edit', $sport) }}"  class="btn btn-success btn-sm" type="button"><i class="far fa-edit"></i> Editar</a>
                                    </td>


                                    <td width="10px">
                                        <form action="{{ route('admin.sports.destroy', $sport) }}" method="POST">
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
@stop

