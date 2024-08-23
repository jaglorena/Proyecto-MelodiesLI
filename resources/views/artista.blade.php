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
    @include('navbar.navbar')
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