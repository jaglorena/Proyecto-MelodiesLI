<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/usuario.css') }}" rel="stylesheet">
</head>

<body>
    @include('navbar.navbar')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container music-section mt-4">
        <div class="row">
            <!-- generos -->
            <h5>Géneros</h5>
            <div class="col-md-9">
                <div class="row">
                    @if (@isset($generos))
                        @foreach($generos as $genero)
                            <div class="col-md-3 genre-card">
                                <a href="/usuario/genero/{{ $genero['id'] }}">
                                    <div class="genre-button" data-genre="Pop">
                                        <img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" alt="Pop">
                                        <h6>{{ $genero['nombre'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="song-list-item">
                            <span>Sin artistas</span>
                        </div>
                    @endif
                </div>
            </div>


            <!-- Top5 -->
            <div class="col-md-3">
                <div class="top-10">
                    <h5>Top 5</h5>
                    <ul class="list-group">
                        @if (@isset($top))
                        @foreach($top as $item)
                            <li class="list-group-item">{{ $item->titulo }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">Sin reproducciones</li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- reproductor -->
        <div class="player-controls">
            <div>
                <span>Song Five</span>
                <span> - Rock Band</span>
            </div>
            <audio id="audio-player" controls>
                <source src="song5.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <!-- lista de artistas y canciones -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h5 class="color-word">Lista de artistas</h5>
                <div class="song-list artist-list">
                    @if (@isset($artistas))
                        @foreach($artistas as $artista)
                            <div class="song-list-item">
                                <span>{{$artista['nombre']}}</span>
                                <span><i class="bi bi-play-circle play-icon"></i></span>
                                <div>
                                    <button class="play-button-icon"><i class="fas fa-play"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="song-list-item">
                            <span>Sin artistas</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <h5 class="color-word">Lista de canciones</h5>
                <div class="song-list song-list-scroll">
                     @if (@isset($canciones))
                        @foreach($canciones as $cancion)
                            <div class="song-list-item">
                                <span>{{ $cancion->titulo }}</span>
                                <span><i class="bi bi-play-circle play-icon"></i></span>
                                <div>
                                    <button class="play-button-icon" id="boton-{{ $cancion->id }}" data-id="{{ $cancion->id }}"><i class="fas fa-play"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="song-list-item">
                            <span>Sin canciones</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/usuario.js') }}"></script>
</body>

</html>
