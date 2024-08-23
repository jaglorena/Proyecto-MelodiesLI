<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/crearartista.css') }}">
</head>
<body>
    @include('navbar.navbar')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4" style="width: 100%; max-width: 600px;">
            <h1 class="text-center mb-4">Artista</h1>
            @if (isset($artista))
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="{{$artista->nombre}}" readonly>
                        <div id="nombreHelp" class="form-text">Nombre del artista</div>
                    </div>
                    <div class="mb-3">
                        <label for="biografia" class="form-label">Biografía:</label>
                        <input type="text" class="form-control" id="biografia" name="biografia" aria-describedby="biografiaHelp" value="{{$artista->biografia}}" readonly>
                        <div id="biografiaHelp" class="form-text">Biografía del artista</div>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género:</label>
                        <input type="text" class="form-control" id="genero" name="genero" aria-describedby="generoHelp" value="{{$artista->genero_id}}" readonly>
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
                        <input type="text" class="form-control" id="genero" name="genero_id" aria-describedby="generoHelp">
                        <div id="generoHelp" class="form-text">Género del artista</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            @endif
            @if (isset($artista))
                <div class="row mt-4">
                    <div class="col text-center">
                        <button class="btn btn-secondary" onclick="window.location.href='{{ url('/artista/'. $artista->id . '/regalias') }}'">Ver regalías</button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
