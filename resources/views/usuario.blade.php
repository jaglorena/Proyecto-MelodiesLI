@extends('layouts.app')

@section('title', 'Melodies Li')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container music-section mt-4">
    <div class="row">
        <!-- Géneros -->
        <h5>Géneros</h5>
        <div class="col-md-9">
            <div class="row">
                @if (isset($generos))
                    @foreach($generos as $genero)
                        <div class="col-md-3 genre-card">
                            <a href="/usuario/genero/{{ $genero['id'] }}">
                                <div class="genre-button" data-genre="{{ $genero['nombre'] }}">
                                    <img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" alt="{{ $genero['nombre'] }}">
                                    <h6>{{ $genero['nombre'] }}</h6>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="song-list-item">
                        <span>Sin géneros disponibles</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Top 5 -->
        <div class="col-md-3">
            <div class="top-10">
                <h5>Top 5</h5>
                <ul class="list-group">
                    @if (isset($top) && count($top))
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

    <!-- Reproductor -->
    <div class="player-controls mt-4">
        <div>
            <span>Song Five</span>
            <span> - Rock Band</span>
        </div>
        <audio id="audio-player" controls>
            <source src="song5.mp3" type="audio/mpeg">
            Tu navegador no soporta audio HTML5.
        </audio>
    </div>

    <!-- Listas de artistas y canciones -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h5 class="color-word">Lista de artistas</h5>
            <div class="song-list artist-list">
                @if (isset($artistas))
                    @foreach($artistas as $artista)
                        <div class="song-list-item">
                            <span>{{ $artista['nombre'] }}</span>
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
                @if (isset($canciones))
                    @foreach($canciones as $cancion)
                        <div class="song-list-item">
                            <span>{{ $cancion->titulo }}</span>
                            <div>
                                <button class="play-button-icon" id="boton-{{ $cancion->id }}" data-id="{{ $cancion->id }}">
                                    <i class="fas fa-play"></i>
                                </button>
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
@endsection

@section('scripts')
    <script src="{{ asset('js/usuario.js') }}"></script>
@endsection
