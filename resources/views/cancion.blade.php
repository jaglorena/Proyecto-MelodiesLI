<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="nav-link" href="#"><img src="https://i.ibb.co/JvTD1Xx/Logo-Melodies-Li-1.png" alt="User" style="width: 30px; border-radius: 50%;"></a>
            <a class="navbar-brand color-word" href="#">Melodies Li</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link color-word" href="#">Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="https://cdn.pixabay.com/photo/2022/11/22/22/38/woman-7610770_1280.png" alt="User" style="width: 30px; border-radius: 50%;"></a>
                    </li>
                </ul>
                <form action="/logout" method="POST" class="logout-form">
                    <button type="submit" class="logout-button">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>


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
                            <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" value="{{$cancion->titulo}}" readonly>
                            <div id="tituloHelp" class="form-text">T&iacute;tulo de la cancion</div>
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                            <input type="text" class="form-control" id="duracion" name="duracion" aria-describedby="tituloHelp" value="{{$cancion->duracion}}" readonly>
                            <div id="tituloHelp" class="form-text">Duraci&oacute;n en formato mm:ss</div>
                        </div>
                        <div class="mb-3">
                            <label for="album" class="form-label">Alb&uacute;m:</label>
                            <input type="text" class="form-control" id="album" name="album_id" aria-describedby="albumHelp" value="{{$cancion->album_id}}" readonly>
                            <div id="albumHelp" class="form-text">Alb&uacute;m al que pertenece</div>
                        </div>
                        <div class="mb-3">
                            <label for="artista" class="form-label">Artista:</label>
                            <input type="text" class="form-control" id="artista" name="artista_id" aria-describedby="artistaHelp" value="{{$cancion->artista_id}}">
                            <div id="artistaHelp" class="form-text">Artista que interpreta</div>
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('guardarCancion') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">T&iacute;tulo:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp">
                            <div id="tituloHelp" class="form-text">T&iacute;tulo de la cancion</div>
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duraci&oacute;n:</label>
                            <input type="text" class="form-control" id="duracion" name="duracion" aria-describedby="tituloHelp">
                            <div id="tituloHelp" class="form-text">Duraci&oacute;n en formato mm:ss</div>
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
