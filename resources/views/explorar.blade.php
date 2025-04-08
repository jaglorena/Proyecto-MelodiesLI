@extends('layouts.app')

@section('title', 'Explorar Canciones')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🎵 Explorar Canciones</h2>
    <div class="row">
        <div class="col-md-4">
            <h4>Géneros</h4>
            <ul class="list-group mb-4">
                @foreach($generos as $genero)
                    <li class="list-group-item">
                        <a href="#" onclick="verPorGenero({{ $genero->id }})">{{ $genero->nombre }}</a>
                    </li>
                @endforeach
            </ul>

            <h4>Artistas</h4>
            <ul class="list-group">
                @foreach($artistas as $artista)
                    <li class="list-group-item">
                        <a href="#" onclick="verPorArtista({{ $artista->id }})">{{ $artista->nombre }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-8">
            <h4>Resultados</h4>
            <div id="resultados">
                <p class="text-muted">Selecciona un género o artista para ver canciones.</p>
            </div>
        </div>
    </div>
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

    function verPorGenero(id) {
        fetch(`/explorar/genero/${id}`)
            .then(res => res.json())
            .then(data => mostrarCanciones(data));
    }

    function verPorArtista(id) {
        fetch(`/explorar/artista/${id}`)
            .then(res => res.json())
            .then(data => mostrarCanciones(data));
    }

    function mostrarCanciones(canciones) {
        const contenedor = document.getElementById('resultados');
        contenedor.innerHTML = '<p>Cargando canciones...</p>';

        setTimeout(() => {
            let html = '';
            if (canciones.length === 0) {
                html = '<p>No se encontraron canciones para esta categoría.</p>';
            } else {
                canciones.forEach(c => {
                    const archivo = c.archivo ?? (c.titulo ? slugify(c.titulo) + '.mp3' : '');
                    const src = `/song/${archivo}`;

                    html += `
                        <div class="cancion-item mb-3 border-bottom pb-3" data-id="${c.id}">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    🎵 <strong>${c.titulo}</strong><br>
                                    Artista: ${c.artista?.nombre || 'Desconocido'}<br>
                                    Álbum: ${c.album?.titulo || 'Desconocido'}
                                </div>
                                <button class="btn btn-sm btn-success play-button mt-2"
                                    data-src="${src}" data-id="${c.id}">
                                    ▶
                                </button>
                            </div>
                            <div class="player-slot mt-2"></div>
                        </div>`;
                });
            }

            contenedor.innerHTML = html;
            activarReproductores();
        }, 300);
    }

    function activarReproductores() {
        document.querySelectorAll('.play-button').forEach(btn => {
            btn.addEventListener('click', () => {
                const src = btn.dataset.src;
                const id = btn.dataset.id;

                // Limpiar anteriores
                document.querySelectorAll('.player-slot').forEach(slot => {
                    slot.innerHTML = '';
                });

                const slot = document.querySelector(`.cancion-item[data-id="${id}"] .player-slot`);
                slot.innerHTML = audioHTML;

                const audio = slot.querySelector('audio');
                audio.querySelector('source').src = src;
                audio.load();
                audio.play();

                // Registrar reproducción
                fetch('/cancion/reproducir', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(r => r.json())
                .then(d => console.log('Reproducción registrada:', d));
            });
        });
    }

    function slugify(text) {
        return text.toString().toLowerCase()
            .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
            .replace(/\s+/g, '_')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '_')
            .trim();
    }
</script>
@endsection
