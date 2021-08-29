<div>
    <div class="card">

            <div class="card-header">
                <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de usuario">
            </div>

        @if($users->count())
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{ route('admin.user.edit',$user)}}" class="btn btn-success btn-sm" type="button"><i class="far fa-edit"></i> Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer">
                    {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    No hay registros con ese nombre o correo
                </div>
            </div>
        @endif
    </div>
</div>
