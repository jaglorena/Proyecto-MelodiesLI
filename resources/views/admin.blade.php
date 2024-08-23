<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    @include('navbar.navbar')
    <div class="contenedor-admin">
        <h1 class="titulo-admin">Opciones de Administrador</h1>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Administrar Artistas</h2>
            <button class="boton-admin mb-2" onclick="window.location.href='{{ url('/adminartista') }}'">+ Agregar Artista</button>
            <table class="tabla-admin-artista">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Biograf&iacute;a</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@isset($artistas))
                            @foreach($artistas as $registro)
                                <tr>
                                    <td>{{ $registro->nombre }}</td>
                                    <td>{{ $registro->biografia }}</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="song-list-item">
                                <span>Sin artistas</span>
                            </div>
                        @endif
                </tbody>
            </table>
        </div>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Administrar Álbumes y Canciones</h2>
            <button class="boton-admin" onclick="window.location.href='{{ url('/album') }}'">Agregar Álbum</button>
            <button class="boton-admin" onclick="window.location.href='{{ url('/cancion') }}'">Agregar Canción</button>
            <button class="boton-admin mb-2" onclick="window.location.href='{{ url('/genero') }}'">Agregar G&eacute;nero</button>
            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>T&iacute;tulo</th>
                        <th>Artista</th>
                    </tr>
                </thead>
                 @if (@isset($canciones))
                            @foreach($canciones as $registro)
                                <tr>
                                    <td>{{ $registro->titulo }}</td>
                                    <td>{{ $registro->nombre }}</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="song-list-item">
                                <span>Sin artistas</span>
                            </div>
                        @endif
            </table>
        </div>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Reporte de regalias</h2>
            <button class="boton-admin" onclick="window.location.href='{{ url('/regalias') }}'">Ver regalias</button>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
