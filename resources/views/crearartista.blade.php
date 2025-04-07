@extends('layouts.app')

@section('title', 'Artista')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Artista</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if (isset($artista))
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="{{ $artista->nombre }}" readonly>
                        <div id="nombreHelp" class="form-text">Nombre del artista</div>
                    </div>

                    <div class="mb-3">
                        <label for="biografia" class="form-label">Biografía:</label>
                        <input type="text" class="form-control" id="biografia" name="biografia" aria-describedby="biografiaHelp" value="{{ $artista->biografia }}" readonly>
                        <div id="biografiaHelp" class="form-text">Biografía del artista</div>
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género:</label>
                        <select class="form-control" id="genero_id" name="genero_id" aria-describedby="genero" disabled>
                            <option value="">Selecciona un género</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->id }}" {{ (isset($artista) && $artista->genero_id == $genero->id) ? 'selected' : '' }}>
                                    {{ $genero->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <div id="generoHelp" class="form-text">Género del artista</div>
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('guardarArtista') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp">
                        <div id="nombreHelp" class="form-text">Nombre del artista</div>
                    </div>

                    <div class="mb-3">
                        <label for="biografia" class="form-label">Biografía:</label>
                        <input type="text" class="form-control" id="biografia" name="biografia" aria-describedby="biografiaHelp">
                        <div id="biografiaHelp" class="form-text">Biografía del artista</div>
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género:</label>
                        <select class="form-control" id="genero_id" name="genero_id" aria-describedby="genero">
                            <option value="">Selecciona un género</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                            @endforeach
                        </select>
                        <div id="generoHelp" class="form-text">Género del artista</div>
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

    @if (isset($artista))
        <div class="row mt-3">
            <div class="col">
                <form method="POST" action="{{ route('artista.destroy', $artista->id) }}" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            <div class="col">
                <button class="btn btn-primary" onclick="window.location.href='{{ url('/artista/' . $artista->id . '/regalias') }}'">Ver regalías</button>
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
