<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regalias - Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!--<a class="nav-link" href="#"><img src="https://i.ibb.co/pZsqW4J/Logo-Melodies-Li.png" alt="User" style="width: 30px; border-radius: 50%;"></a>-->
            <a class="nav-link" href="#"><img src="https://i.ibb.co/JvTD1Xx/Logo-Melodies-Li-1.png" alt="User" style="width: 30px; border-radius: 50%;"></a>
            <a class="navbar-brand color-word" href="#">Melodies Li</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link color-word" href="#">Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="https://cdn.pixabay.com/photo/2022/11/22/22/38/woman-7610770_1280.png" alt="User" style="width: 30px; border-radius: 50%;"></a>
                    </li>
                </ul>
                <form action="/logout" method="POST" class="logout-form">
                    <button type="submit" class="logout-button">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Regalias</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Titulo</th>
                        <th scope="col"># de reproducciones</th>
                        <th scope="col">Total</th>
                    </thead>
                    <tbody>
                         @php $totalSum = 0; @endphp
                        @if (@isset($reproducciones))
                            @foreach($reproducciones as $registro)
                            @php
                                $total = $registro->cantidad_reproducciones * $monto->monto;
                                $totalSum += $total;
                            @endphp
                            <tr>
                                <th scope="row">{{ $registro->titulo }}</th>
                                <th scope="row">{{ $registro->cantidad_reproducciones }}</th>
                                <th scope="row">$ {{ number_format($registro->cantidad_reproducciones * $monto->monto, 2) }}</th>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row" colspan="2">Total Sumado</th>
                                <th scope="row">$ {{ number_format($totalSum, 2) }}</th>
                            </tr>
                        @else
                            <div class="song-list-item">
                                <span>Sin artistas</span>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
