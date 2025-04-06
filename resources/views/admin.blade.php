@extends('layouts.app')

@section('title', 'Admin Melodies Li')

@section('content')
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
                    <tr>
                        <td colspan="2">Sin artistas</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="seccion-admin">
        <h2 class="subtitulo-admin">Administrar Álbumes y Canciones</h2>
        <button class="btn btn-primary" onclick="window.location.href='{{ url('/album') }}'">Agregar Álbum</button>
        <button class="boton-admin" onclick="window.location.href='{{ url('/cancion') }}'">Agregar Canción</button>
        <button class="boton-admin mb-2" onclick="window.location.href='{{ url('/genero') }}'">Agregar G&eacute;nero</button>
        <table class="tabla-admin">
            <thead>
                <tr>
                    <th>T&iacute;tulo</th>
                    <th>Artista</th>
                </tr>
            </thead>
            <tbody>
                @if (@isset($canciones))
                    @foreach($canciones as $registro)
                        <tr>
                            <td>{{ $registro->titulo }}</td>
                            <td>{{ $registro->nombre }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Sin canciones</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="seccion-admin">
        <h2 class="subtitulo-admin">Reporte de regalias</h2>
        <button class="boton-admin" onclick="window.location.href='{{ url('/regalias') }}'">Ver regalias</button>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
