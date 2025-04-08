@extends('layouts.app')

@section('title', 'Canciones')

@section('content')
<div class="container form-wrapper">
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
                        <select class="form-control" id="album" name="album_id" aria-describedby="genero" disabled>
                            <option value="">Selecciona un género</option>
                            @foreach($albumes as $album)
                                <option value="{{ $album->id }}" {{ (isset($cancion) && $cancion->album_id == $album->id) ? 'selected' : '' }}>
                                    {{ $album->titulo }}
                                </option>
                            @endforeach
                        </select>
                        <div id="albumHelp" class="form-text">Alb&uacute;m al que pertenece</div>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <select class="form-control" id="artista" name="artista_id" aria-describedby="genero" disabled>
                            <option value="">Selecciona un artista</option>
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}" {{ (isset($cancion) && $cancion->artista_id == $artista->id) ? 'selected' : '' }}>
                                    {{ $artista->nombre }}
                                </option>
                            @endforeach
                        </select>
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
                        <select class="form-control" id="album" name="album_id" aria-describedby="albumHelp">
                            <option value="">Selecciona un &aacute;lbum</option>
                            @foreach($albumes as $album)
                                <option value="{{ $album->id }}">{{ $album->titulo }}</option>
                            @endforeach
                        </select>
                        <div id="albumHelp" class="form-text">Alb&uacute;m al que pertenece</div>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <select class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp">
                            <option value="">Selecciona un artista</option>
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                            @endforeach
                        </select>
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
    @if (isset($cancion))
        <div class="row mt-3">
            <div class="col">
                <form method="POST" action="{{ route('cancion.destroy', $cancion->id) }}" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar este artista? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
