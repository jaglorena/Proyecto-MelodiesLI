@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Explorar Canciones</h2>
    <div class="row">
        <div class="col-md-4 bg-dark text-light p-3 rounded">
            <h4>Géneros</h4>
            <ul class="list-group mb-4">
                @foreach($generos as $genero)
                <li class="list-group-item">
                    <a href="#" class="link-genero" onclick="event.preventDefault(); verPorGenero({{ $genero->id }})">
                        {{ $genero->nombre }}
                    </a>
                </li>
                @endforeach
            </ul>

            <h4>Artistas</h4>
            <ul class="list-group">
                @foreach($artistas as $artista)
                <li class="list-group-item">
                    <a href="#" class="link-artista" onclick="event.preventDefault(); verPorArtista({{ $artista->id }})">
                        {{ $artista->nombre }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-8">
            <h4>Resultados</h4>
            <div id="resultados">
                <p style="color: #f0f0f0;">Selecciona un género o artista para ver canciones.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
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
                    html += `
                        <div class="mb-3">
                            <strong>${c.titulo}</strong><br>
                            Artista: ${c.artista?.nombre || 'Desconocido'}<br>
                            Álbum: ${c.album?.titulo || 'Desconocido'}<br>
                            <audio controls src="/storage/${c.ruta || ''}" class="mt-1"></audio>
                        </div>
                        <hr>`;
                });
            }
            contenedor.innerHTML = html;
        }, 300); 
    }

</script>
@endsection
