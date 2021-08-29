<x-app-layout>
    <div class="container py-8">
            <h1 class="title"><span>Todas las apuestas de: </span>{{$sport->name}}</h1>
            <div class="py-5 album bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($bests as $best)
                        <div class="col">
                        <div class="shadow-sm card">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{Storage::url($best->image->url)}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
                            <div class="card-body">
                                <p>{{$best->name}}</p>
                            <p class="card-text">{{$best->extract}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a type="button" href="{{route('best.show', $best)}}" class="btn btn-mas">Ver mas...</a>
                                </div>
                                <small class="text-muted">Creado el: {{$best->created_at}}</small>
                            </div>
                            </div>
                        </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="p-4 mt-4" >
                {{$bests->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
