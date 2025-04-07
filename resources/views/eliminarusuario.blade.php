@extends('layouts.app')

@section('title', 'Administrar Usuarios')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Usuarios</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ ucfirst($usuario->tipo_usuario) }}</td>
                <td>
                    @if($usuario->tipo_usuario !== 'administrador')
                        <form action="{{ route('usuarios.eliminar', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    @else
                        <span class="text-muted">No se puede eliminar</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
