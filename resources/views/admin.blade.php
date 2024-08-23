<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    @include('navbar.navbar')
    <div class="contenedor-admin">
        <h1 class="titulo-admin">Opciones de Administrador</h1>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Administrar Artistas</h2>
            <button class="boton-admin">+ Agregar Artista</button>
            <table class="tabla-admin-artista">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Administrar Álbumes y Canciones</h2>
            <button class="boton-admin">+ Agregar Álbum</button>
            <button class="boton-admin">+ Agregar Canción</button>
            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Artista</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 
                    <tr>
                        <td>Fecha</td>
                        <td>Descripción</td>
                        <td>Descargar Reporte</td>
                    </tr> 

                </tbody>
            </table>
        </div>

        <div class="seccion-admin">
            <h2 class="subtitulo-admin">Generar Reportes</h2>


        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>