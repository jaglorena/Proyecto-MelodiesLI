@extends('layouts.app')

@section('title', 'Buscador')


@section('content')
<div class="container mt-5">

    {{-- Input de búsqueda --}}
    <form method="GET" action="{{ route('buscar.resultados') }}" class="mb-5">
        <input type="text" name="nombre" class="form-control form-control-lg" placeholder="🔍 Buscar canciones, artistas, álbumes o géneros..." required>
    </form>

    @if(isset($buscado))
        <h4 class="mb-4">Resultados para: <strong>{{ $buscado }}</strong></h4>

        {{-- Género y canciones en dos columnas --}}
        @if(\App\Models\Genero::whereRaw('LOWER(nombre) = ?', [strtolower($buscado)])->exists())
            <div class="row mb-5">
                {{-- Género --}}
                <div class="col-md-4">
                    <h5 class="fw-bold">Resultado principal</h5>
                    <div class="card p-3">
                        <img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" class="card-img-top" alt="Género">
                        <div class="card-body">
                            <h5 class="card-title">{{ ucfirst($buscado) }}</h5>
                            <p class="card-text">Género</p>
                        </div>
                    </div>
                </div>

                {{-- Canciones --}}
                <div class="col-md-8">
                    <h5 class="fw-bold">Canciones</h5>
                    @forelse($canciones as $cancion)
                        @php
                            $archivo = Str::slug($cancion->titulo, '_') . '.mp3';
                        @endphp
                        <div class="cancion-item mb-3 border-bottom pb-3" data-id="{{ $cancion->id }}">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    🎵 <strong>{{ $cancion->titulo }}</strong>
                                </div>
                                <button class="btn btn-sm btn-success play-button"
                                    data-src="{{ asset('song/' . $archivo) }}"
                                    data-id="{{ $cancion->id }}">
                                    ▶
                                </button>
                            </div>
                            <div class="player-slot mt-2"></div>
                        </div>
                    @empty
                        <p>No se encontraron canciones</p>
                    @endforelse
                </div>
            </div>
        @else
            {{-- Si no es género, mostrar canciones normal --}}
            <div class="mb-5">
                <h5 class="fw-bold">Canciones</h5>
                @forelse($canciones as $cancion)
                    @php
                        $archivo = Str::slug($cancion->titulo, '_') . '.mp3';
                    @endphp
                    <div class="cancion-item mb-3 border-bottom pb-3" data-id="{{ $cancion->id }}">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                🎵 <strong>{{ $cancion->titulo }}</strong>
                            </div>
                            <button class="btn btn-sm btn-success play-button"
                            data-src="{{ asset('song/' . Str::slug($cancion->titulo, '_') . '.mp3') }}"

                                data-id="{{ $cancion->id }}">
                                ▶
                            </button>
                        </div>
                        <div class="player-slot mt-2"></div>
                    </div>
                @empty
                    <p>No se encontraron canciones</p>
                @endforelse
            </div>
        @endif

        {{-- Artistas --}}
        <div class="mb-5">
            <h5 class="fw-bold">Artistas</h5>
            <div class="d-flex flex-wrap gap-3">
                @forelse($artistas as $artista)
                    <div class="text-center">
                        <img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        <p class="mt-2 mb-0">{{ $artista->nombre }}</p>
                        <small>Artista</small>
                    </div>
                @empty
                    <p>No se encontraron artistas</p>
                @endforelse
            </div>
        </div>

        {{-- Álbumes --}}
        <div class="mb-5">
            <h5 class="fw-bold">Álbumes</h5>
            <div class="d-flex flex-wrap gap-3">
                @forelse($albumes as $album)
                    <div class="card" style="width: 150px;">
                        <img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Álbum">
                        <div class="card-body p-2">
                            <p class="card-title mb-0" style="font-size: 14px;">{{ $album->titulo }}</p>
                            <small>Álbum</small>
                        </div>
                    </div>
                @empty
                    <p>No se encontraron álbumes</p>
                @endforelse
            </div>
        </div>
    @endif

</div>
@endsection

@section('scripts')
<script>
    const audioHTML = `
        <audio controls autoplay class="w-100 mt-2">
            <source src="" type="audio/mpeg">
            Tu navegador no soporta audio HTML5.
        </audio>
    `;

    document.querySelectorAll('.play-button').forEach(btn => {
        btn.addEventListener('click', () => {
            const src = btn.dataset.src;
            const id = btn.dataset.id;

            // Limpiar cualquier reproductor anterior
            document.querySelectorAll('.player-slot').forEach(slot => {
                slot.innerHTML = '';
            });

            // Inyectar reproductor
            const slot = document.querySelector(`.cancion-item[data-id="${id}"] .player-slot`);
            slot.innerHTML = audioHTML;

            // Cargar la canción
            const audio = slot.querySelector('audio');
            audio.querySelector('source').src = src;
            audio.load();
            audio.play();
        });
    });
</script>
@endsection
