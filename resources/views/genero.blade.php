@extends('layouts.app')

@section('title', 'Género')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Género</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if (isset($genero))
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="{{ $genero->nombre }}" readonly>
                        <div id="nombreHelp" class="form-text">Nombre del género</div>
                    </div>
                </form>
            @else
                <form method="POST" action="{{ route('guardarGenero') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp">
                        <div id="nombreHelp" class="form-text">Nombre del género</div>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
