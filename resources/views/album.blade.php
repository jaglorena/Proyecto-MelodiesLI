@extends('layouts.app')

@section('title', 'Álbum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Álbum</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if (isset($album))
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" value="{{ $album->titulo }}" readonly>
                        <div id="tituloHelp" class="form-text">Nombre del album</div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de lanzamiento:</label>
                        <input type="text" class="form-control" id="fecha" name="fecha_lanzamiento" aria-describedby="fechaHelp" value="{{ $album->fecha_lanzamiento }}" readonly>
                        <div id="fechaHelp" class="form-text">Fecha de lanzamiento del album (YYYY-MM-DD)</div>
                    </div>
                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <input type="text" class="form-control" id="artista" name="artista" aria-describedby="artistaHelp" value="{{ $album->artista_id }}" readonly>
                        <div id="artistaHelp" class="form-text">Artista que interpreta las canciones</div>
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('guardarAlbum') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp">
                        <div id="tituloHelp" class="form-text">Nombre del album</div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de lanzamiento:</label>
                        <input type="text" class="form-control" id="fecha" name="fecha_lanzamiento" aria-describedby="fechaHelp">
                        <div id="fechaHelp" class="form-text">Fecha de lanzamiento del album (YYYY-MM-DD)</div>
                    </div>
                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <input type="text" class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp">
                        <div id="artistaHelp" class="form-text">Artista que interpreta las canciones</div>
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
