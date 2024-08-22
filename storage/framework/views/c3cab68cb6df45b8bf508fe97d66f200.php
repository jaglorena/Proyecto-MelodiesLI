<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
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
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\Fam77\Desktop\Proyecto-MelodiesLI\resources\views/admin.blade.php ENDPATH**/ ?>