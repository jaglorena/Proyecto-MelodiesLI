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
                <form method="POST" action="{{ route('guardarCancion') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $cancion->titulo }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" value="{{ $cancion->duracion }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="album" class="form-label">Álbum:</label>
                        <select class="form-control" name="album_id" disabled>
                            @foreach($albumes as $album)
                                <option value="{{ $album->id }}" {{ $cancion->album_id == $album->id ? 'selected' : '' }}>
                                    {{ $album->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <select class="form-control" name="artista_id" disabled>
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}" {{ $cancion->artista_id == $artista->id ? 'selected' : '' }}>
                                    {{ $artista->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Reproductor si existe archivo --}}
                    @php
                        $archivo = $cancion->archivo ?? Str::slug($cancion->titulo, '_') . '.mp3';
                    @endphp
                    @if(file_exists(public_path('song/' . $archivo)))
                        <audio controls class="w-100 mt-3">
                            <source src="{{ asset('song/' . $archivo) }}" type="audio/mpeg">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                    @else
                        <p class="text-warning">No se encontró el archivo de audio asociado.</p>
                    @endif

                </form>
            @else
                <form method="POST" action="{{ route('guardarCancion') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">T&iacute;tulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                        <input type="text" class="form-control" id="duracion" name="duracion">
                    </div>

                    <div class="mb-3">
                        <label for="album" class="form-label">Álbum:</label>
                        <select class="form-control" name="album_id">
                            @foreach($albumes as $album)
                                <option value="{{ $album->id }}">{{ $album->titulo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="artista" class="form-label">Artista:</label>
                        <select class="form-control" name="artista_id">
                            @foreach($artistas as $artista)
                                <option value="{{ $artista->id }}">{{ $artista->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo MP3:</label>
                        <input type="file" class="form-control" name="archivo" accept="audio/mp3,audio/mpeg">
                        <small class="form-text text-muted">Sube el archivo de la canción (formato .mp3)</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
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
        return confirm('¿Estás seguro de que deseas eliminar esta canción? Esta acción no se puede deshacer.');
    }
</script>
@endsection
