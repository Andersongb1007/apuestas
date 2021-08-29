<x-app-layout>

    <div class="container">
        <h1 class="titulo">Bienvenido a la mejor pagina de apuestas de portivas</h1>
        <h2 class="titulo-2">Las ultimas apuestas activas son las siguientes</h2>
    </div>

        <div class="py-5 album bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($bests as $best)
                    <div class="col">
                    <div class="shadow-sm card">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="
                        @if($best->image){{Storage::url($best->image->url)}} @else https://mcleansmartialarts.com/wp-content/uploads/2017/04/default-image-620x600.jpg @endif" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
                        <div class="card-body">
                            <p>{{$best->name}}</p>
                        <p class="card-text">{{$best->extract}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a type="button" href="{{route('home.show', $best)}}" class="btn btn-mas">Ver mas...></a>
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

</x-app-layout>

