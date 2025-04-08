@extends('layouts.app')

@section('title', 'Melodies Li')

@section('content')
{{-- Incluir FontAwesome para los íconos de reproducción --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <div class="player-controls mt-4" id="player-container" style="display: none;">
        <div id="song-info" class="mb-2 fw-bold"></div>
        <audio id="audio-player" controls class="w-100">
            <source src="" type="audio/mpeg">
            Tu navegador no soporta audio HTML5.
        </audio>
    </div>

    <!-- Lista de artistas y canciones -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h5 class="color-word">Lista de artistas</h5>
            <div class="song-list artist-list">
                @if (isset($artistas))
                    @foreach($artistas as $artista)
                        <div class="song-list-item">
                            <span>{{ $artista['nombre'] }}</span>
                            <div>
                                <button class="play-button-icon btn btn-sm btn-success">
                                    <i class="fas fa-play"></i>
                                </button>
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
                        @php
                            $archivo = Str::slug($cancion->titulo, '_') . '.mp3';
                        @endphp
                        <div class="song-list-item">
                            <span><i class="fas fa-music me-1"></i> {{ $cancion->titulo }}</span>
                            <div>
                                <button class="play-button-icon btn btn-sm btn-success"
                                    data-src="{{ asset('song/' . $archivo) }}"
                                    data-id="{{ $cancion->id }}"
                                    data-titulo="{{ $cancion->titulo }}">
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
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const audio = document.getElementById('audio-player');
        const source = audio.querySelector('source');
        const playerContainer = document.getElementById('player-container');
        const songInfo = document.getElementById('song-info');

        document.querySelectorAll('.play-button-icon').forEach(btn => {
            btn.addEventListener('click', () => {
                const src = btn.dataset.src;
                const titulo = btn.dataset.titulo;
                const id = btn.dataset.id;

                if (!src) {
                    alert("Esta canción no tiene un archivo asociado.");
                    return;
                }

                // Mostrar el reproductor
                playerContainer.style.display = 'block';
                songInfo.textContent = `🎵 Reproduciendo: ${titulo || 'Desconocida'}`;

                source.src = src;
                audio.load();
                audio.play();

                // Registrar reproducción si hay ID
                if (id) {
                    fetch('/cancion/reproducir', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ id: id })
                    }).then(response => {
                        if (!response.ok) {
                            console.error("Error al aumentar reproducción.");
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
