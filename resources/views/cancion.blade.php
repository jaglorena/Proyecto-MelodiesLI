@extends('layouts.app')

@section('title', 'Canciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Canci&oacute;n</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if (isset($cancion))
                <form method="POST" action="{{ route('guardarCancion') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" value="{{ $cancion->titulo }}" readonly>
                        <div id="tituloHelp" class="form-text">T&iacute;tulo de la canci&oacute;n</div>
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" aria-describedby="duracionHelp" value="{{ $cancion->duracion }}" readonly>
                        <div id="duracionHelp" class="form-text">Duraci&oacute;n en formato mm:ss</div>
                    </div>

                    <div class="mb-3">
                        <label for="album" class="form-label">Alb&uacute;m:</label>
                        <input type="text" class="form-control" id="album" name="album_id" aria-describedby="albumHelp" value="{{ $cancion->album_id }}" readonly>
                        <div id="albumHelp" class="form-text">Alb&uacute;m al que pertenece</div>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <input type="text" class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp" value="{{ $cancion->artista_id }}" readonly>
                        <div id="artistaHelp" class="form-text">Artista que interpreta</div>
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('guardarCancion') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp">
                        <div id="tituloHelp" class="form-text">T&iacute;tulo de la canci&oacute;n</div>
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" aria-describedby="duracionHelp">
                        <div id="duracionHelp" class="form-text">Duraci&oacute;n en formato mm:ss</div>
                    </div>

                    <div class="mb-3">
                        <label for="album" class="form-label">Alb&uacute;m:</label>
                        <input type="text" class="form-control" id="album" name="album_id" aria-describedby="albumHelp">
                        <div id="albumHelp" class="form-text">Alb&uacute;m al que pertenece</div>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <input type="text" class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp">
                        <div id="artistaHelp" class="form-text">Artista que interpreta</div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
