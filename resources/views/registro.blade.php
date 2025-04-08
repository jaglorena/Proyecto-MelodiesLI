@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="container mt-5 form-wrapper">
    <h2 class="text-center mb-4">Registro de Usuario</h2>

    <form method="POST" action="{{ route('registrarUsuario') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" id="name" name="nombre" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="role" class="form-label">Tipo de Usuario:</label>
            <select id="role" name="tipo_usuario" class="form-control" required>
                <option value="cliente">Cliente</option>
                <option value="administrador">Administrador</option>
                <option value="artista">Artista</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
</div>
@endsection
