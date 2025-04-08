@extends('layouts.app')

@section('title', 'Melodies Li')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Melodies Li')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
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
                        <div class="d-flex justify-content-between align-items-center bg-dark text-light p-3 rounded mb-2 shadow-sm">
                            <span class="fw-semibold"><i class="fas fa-user me-2"></i>{{ $artista['nombre'] }}</span>
                            <span class="badge bg-secondary">Artista</span>
                        </div>
                    @endforeach
                @else
                    <div class="text-light">Sin artistas disponibles</div>
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
                        <div class="d-flex justify-content-between align-items-center bg-dark text-light p-3 rounded mb-2 shadow-sm">
                            <span class="fw-semibold"><i class="fas fa-music me-2"></i>{{ $cancion->titulo }}</span>
                            <button class="btn btn-outline-light btn-sm rounded-circle play-button-icon"
                                data-src="{{ asset('song/' . $archivo) }}"
                                data-id="{{ $cancion->id }}"
                                data-titulo="{{ $cancion->titulo }}">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="text-light">Sin canciones disponibles</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const audio = document.getElementById('audio-player');
        const source = audio.querySelector('source');
        const playerContainer = document.getElementById('player-container');
        const songInfo = document.getElementById('song-info');
        let currentBtn = null;

        document.querySelectorAll('.play-button-icon').forEach(btn => {
            btn.addEventListener('click', () => {
                const src = btn.dataset.src;
                const titulo = btn.dataset.titulo;
                const id = btn.dataset.id;

                if (!src) {
                    alert("Esta canción no tiene un archivo asociado.");
                    return;
                }

                // Pausar si ya está reproduciendo la misma canción
                if (currentBtn === btn && !audio.paused) {
                    audio.pause();
                    btn.innerHTML = '<i class="fas fa-play"></i>';
                    return;
                }

                // Resetear botón anterior
                if (currentBtn && currentBtn !== btn) {
                    currentBtn.innerHTML = '<i class="fas fa-play"></i>';
                }

                // Reproducir
                playerContainer.style.display = 'block';
                songInfo.textContent = `Reproduciendo: ${titulo}`;
                source.src = src;
                audio.load();
                audio.play();
                btn.innerHTML = '<i class="fas fa-pause"></i>';
                currentBtn = btn;

                // Registrar reproducción
                if (id) {
                    fetch('/cancion/reproducir', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ id: id })
                    }).catch(err => console.error("Error al registrar reproducción", err));
                }
            });
        });

        // Reset ícono cuando termina
        audio.addEventListener('ended', () => {
            if (currentBtn) {
                currentBtn.innerHTML = '<i class="fas fa-play"></i>';
                currentBtn = null;
            }
        });
    });
</script>
@endsection
