@extends('adminlte::page')

@section('title', 'Admin')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content_header')
<a href="{{ route('admin.bests.create')}}" class="float-right btn btn-primary btn-sm">Crear nueva Apuesta <i class="fas fa-plus-circle"></i></a>
    <h1>Listado de apuestas</h1>


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
            <table style="width:100%;"  id="apuestas" class="table table-bordered table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Resumem</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        @foreach ($best as $best)
                            <tr>
                                <td>{{$best->id}}</td>
                                <td>{{$best->name}}</td>
                                <td>{{$best->extract}}</td>
                                <td>{{$best->created_at->diffForHumans()}}</td>
                                <td width="10"><a href="{{ route('admin.bests.edit',$best) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Editar</a></td>
                                <td width="10">
                                    <form action="{{ route('admin.bests.destroy', $best) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#apuestas').DataTable();
    </script>
@endsection
