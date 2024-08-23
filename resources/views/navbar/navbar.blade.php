<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('path/to/logo.png') }}" alt="Logo">
        {{ config('app.name', 'Laravel') }}
    </a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <span class="nav-link">Tipo de usuario: {{ Auth::user()->role }}</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link">Hola, {{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registro">Registrarse</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
