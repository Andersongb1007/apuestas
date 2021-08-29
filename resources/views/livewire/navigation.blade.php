<div class="">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNav">
            <ul class="gap-2 navbar-nav ms-md-auto">
                <li class="rounded nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}"><i class="fas fw fa-home"></i> Inicio</a>
                </li>

                @foreach ($sports as $sport)

                <li class="rounded nav-item">
                <a class="nav-link" href="{{ route('home.sport', $sport) }}">{{$sport->name}}</a>
                </li>
                @endforeach



                <li class="p-0 rounded nav-item dropdown">
                <a class="float-right p-0 nav-link hover-profile" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="profile-avatar" src="{{auth()->user()->profile_photo_url}}" alt=""> </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.show')}}">Perfil</a></li>

                    @can('admin.index')
                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a></li>
                    @endcan

                    <li>
                    <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div>
