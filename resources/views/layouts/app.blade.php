<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Melodies LI')</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    @yield('styles')
</head>
<body>
    {{-- Navbar para CLIENTE --}}
    {{-- Simula estar logueado como cliente --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://i.ibb.co/JvTD1Xx/Logo-Melodies-Li-1.png" alt="Logo" style="width: 30px; border-radius: 50%;"> Melodies Li</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCliente">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCliente">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Explorar Canciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mis Compras</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                    <li class="nav-item">
                        <span class="nav-link">Hola, {{--{{ Auth::user()->nombre }}--}}</span>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">@csrf
                            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Navbar para ARTISTA --}}
    {{-- Simula estar logueado como artista --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://i.ibb.co/JvTD1Xx/Logo-Melodies-Li-1.png" alt="Logo" style="width: 30px; border-radius: 50%;"> Melodies Li</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarArtista">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarArtista">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Mis Canciones</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Subir Música</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Estadísticas</a></li>
                    <li class="nav-item">
                        <span class="nav-link">Hola, {{--{{ Auth::user()->nombre }}<--}}</span>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">@csrf
                            <button type="submit" class="btn btn-link nav-link text-white">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Navbar para ADMINISTRADOR --}}
    {{-- Simula estar logueado como admin --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://i.ibb.co/JvTD1Xx/Logo-Melodies-Li-1.png" alt="Logo" style="width: 30px; border-radius: 50%;"> Melodies Li</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Panel de Control</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Canciones</a></li>
                    <li class="nav-item">
                        <span class="nav-link">Hola, {{--{{ Auth::user()->nombre }}<--}}</span>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">@csrf
                            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  