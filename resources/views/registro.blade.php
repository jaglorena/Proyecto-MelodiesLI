<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}"> 
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>

        <form method="POST" action="{{ route('registrarUsuario') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="nombre" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="role">Tipo de Usuario:</label>
                <select id="role" name="tipo_usuario" class="form-control" required>
                    <option value="cliente">Cliente</option>
                    <option value="administrador">Administrador</option>
                    <option value="artista">Artista</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> 
</body>
</html>
