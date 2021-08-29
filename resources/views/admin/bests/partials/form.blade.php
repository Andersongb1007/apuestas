<div class="form-group">
                {!! Form::label('name', 'Nombre de la apuesta') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la apuesta']) !!}
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la apuesta', 'readonly']) !!}
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                {!! Form::label('sport_id', 'Deporte') !!}
                {!! Form::select('sport_id', $sports, null, ['class' => 'form-control']) !!}
            @error('sport_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Estado de la apuesta</p>
                <label>
                    {!! Form::radio('status', 1, true) !!}
                    Inactivo
                </label>

                <label>
                    {!! Form::radio('status', 2, true) !!}
                    Publicado
                </label>

                <label>
                    {!! Form::radio('status', 3, true) !!}
                    Finalizado
                </label>

            @error('status')
            <br>
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

        <div class="mb-4 row">
            <div class="col">
                <div class="image-wrapper">
                    @isset ($best->image)
                        <img id="picture" src="{{ Storage::url($best->image->url) }}" alt="">
                    @else
                        <img id="picture" src="https://mcleansmartialarts.com/wp-content/uploads/2017/04/default-image-620x600.jpg" alt="">
                    @endisset

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {!! Form::label('file', 'Imagen de la apuesta') !!}
                    {!! Form::file('file', ['class' =>'form-control-file','accept'=> 'image/*']) !!}
                </div>
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
                <p>Imagen que se mostrara en la apuesta.</p>
            </div>
        </div>

            <div class="form-group">
                {!! Form::label('extract', 'Resumen de la apuesta') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la apuesta']) !!}
            @error('extract')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Descripcion de la apuesta') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Resumen de la apuesta']) !!}
            @error('body')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
