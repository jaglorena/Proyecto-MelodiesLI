<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melodies Li</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/usuario.css')); ?>" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
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

    <!--  -->
    <div class="container music-section mt-4">
        <div class="row">
            <!-- generos -->
            <h5>Géneros</h5>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 genre-card">
                        <div class="genre-button" data-genre="Pop">
                            <img src="https://pyxis.nymag.com/v1/imgs/3a3/b1f/2141226b8ab1ae07afe4b541ee0d2b0825-11-yic-pop-essay.rsocial.w1200.jpg" alt="Pop">
                            <h6>Pop</h6>
                        </div>
                    </div>
                    <div class="col-md-3 genre-card">
                        <div class="genre-button" data-genre="Clásica">
                            <img src="https://i.ytimg.com/vi/crJ_7ThsqOQ/maxresdefault.jpg" alt="Clásica">
                            <h6>Clásica</h6>
                        </div>
                    </div>
                    <div class="col-md-3 genre-card">
                        <div class="genre-button" data-genre="K-Pop">
                            <img src="https://punto.mx/wp-content/uploads/2021/11/kpop.jpg" alt="Girl Band">
                            <h6>K-Pop</h6>
                        </div>
                    </div>
                    <div class="col-md-3 genre-card">
                        <div class="genre-button" data-genre="Rock">
                            <img src="https://tic.periodismoudec.cl/wp-content/uploads/2023/06/rock-argentino-malvinas-elena-canton.jpeg" alt="Rock">
                            <h6>Rock</h6>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Top5 -->
            <div class="col-md-3">
                <div class="top-10">
                    <h5>Top 5</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Song Five</li>
                        <li class="list-group-item">Song Six</li>
                        <li class="list-group-item">Song Seven</li>
                        <li class="list-group-item">Song Eight</li>
                        <li class="list-group-item">Song Nine</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- reproductor -->
        <div class="player-controls">
            <div>
                <span>Song Five</span>
                <span> - Rock Band</span>
            </div>
            <audio id="audio-player" controls>
                <source src="song5.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <!-- lista de artistas y canciones -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h5>Lista de artistas</h5>
                <div class="song-list artist-list">
                    <div class="song-list-item">
                        <span>Nombre canción <p>Artista</p></span>
                        <span><i class="bi bi-play-circle play-icon"></i></span>
                        <div>
                            <button class="play-button-icon"><i class="fas fa-play"></i></button>
                        </div>
                    </div>
                    <div class="song-list-item">
                        <span>Nombre canción <p>Artista</p></span>
                        <span><i class="bi bi-play-circle play-icon"></i></span>
                        <div>
                            <button class="play-button-icon"><i class="fas fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h5>Lista de canciones</h5>
                <div class="song-list song-list-scroll">
                    <div class="song-list-item">
                        <span>Nombre canción <p>Artista</p></span>
                        <span><i class="bi bi-play-circle play-icon"></i></span>
                        <div>
                            <button class="play-button-icon"><i class="fas fa-play"></i></button>
                        </div>
                    </div>
                    <div class="song-list-item">
                        <span>Nombre canción <p>Artista</p></span>
                        <span><i class="bi bi-play-circle play-icon"></i></span>
                        <div>
                            <button class="play-button-icon"><i class="fas fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/usuario.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Proyecto-MelodiesLI-1\resources\views/usuario.blade.php ENDPATH**/ ?>