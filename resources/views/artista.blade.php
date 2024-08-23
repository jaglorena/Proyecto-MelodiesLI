<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/artista.css') }}">
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


    <div class="container">
        <h1>Opciones de Artista</h1>
        <h2>Regalías Generadas</h2>
        <div class="section">
            <table class="table-container">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Descargar Reporte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>