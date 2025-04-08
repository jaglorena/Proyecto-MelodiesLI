@extends('layouts.app')

@section('title', 'Álbum')

@section('content')
<div class="container form-wrapper">
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
                        <select class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp" disabled>
                            <option value="">Selecciona un artista</option>
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}" {{ $artista->id == $album->artista_id ? 'selected' : '' }}>{{ $artista->nombre }}</option>
                            @endforeach
                        </select>
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
                        <select class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp">
                            <option value="">Selecciona un artista</option>
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                            @endforeach
                        </select>
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
    @if(isset($album))
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('album.destroy', $album->id) }}" onsubmit="return confirmDelete();">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endif
@section('scripts')
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este album? Esta acción no se puede deshacer.');
    }
</script>
@endsection
@endsection
