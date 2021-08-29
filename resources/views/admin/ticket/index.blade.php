@extends('adminlte::page')

@section('title', 'Lista de tickets')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content_header')
    <h1>Listado de teckets</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <div class="container">
                    <div class="table-responsive">
                <table  id="example" class="table table-bordered table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th>Identificador</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Monto</th>
                            <th>Usuario ID</th>
                            <th>Apuesta ID</th>
                            <th>Deporte ID</th>
                            <th>Tipo ID</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->code}}</td>
                                    <td>{{$ticket->name}}</td>
                                    <td>{{$ticket->monto}}</td>
                                    <td>{{$ticket->name_id}}</td>
                                    <td>{{$ticket->best_id}}</td>
                                    <td>{{$ticket->sport_id}}</td>
                                    <td>{{$ticket->type_id}}</td>
                                    <td>{{$ticket->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
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
