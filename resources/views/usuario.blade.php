@extends('layouts.app')

@section('title', 'Melodies Li')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Melodies Li')</title>

    <!-- ✅ Asegúrate de tener esto -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Agrega aquí Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-K6B1..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tu hoja de estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
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
                    <div class="d-flex justify-content-between align-items-center bg-dark text-light p-3 rounded mb-2 shadow-sm">
                        <span class="fw-semibold">{{ $artista['nombre'] }}</span>
                        <button class="btn btn-outline-light btn-sm rounded-circle">
                            <i class="fa-solid fa-play"></i>
                        </button>
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
                     <div class="d-flex justify-content-between align-items-center bg-dark text-light p-3 rounded mb-2 shadow-sm">
                            <span class="fw-semibold">{{ $cancion->titulo }}</span>
                            <button class="btn btn-outline-light btn-sm rounded-circle">
                                <i class="fa-solid fa-play"></i>
                            </button>
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
