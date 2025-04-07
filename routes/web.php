<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\ExplorarController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegaliasController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\PermisosAdmin;
use Illuminate\Support\Facades\Route;

// Página de inicio de sesión
Route::get('/', [LoginController::class, 'showLogin'])->name('login');

// Página de registro
Route::get('/registro', [UsuarioController::class, 'registro'])->name('registro');
Route::get('/registro', [RegistroController::class, 'showRegistro']);
Route::post('/registro', [RegistroController::class, 'registro'])->name('registrarUsuario');

// Enviar formulario de inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Rutas de artistas y usuarios
Route::middleware(['auth'])->group(function () {
    Route::get('/usuario', [UsuarioController::class, 'showUsuario']);
    Route::get('/usuario/genero/{id}', [UsuarioController::class, 'mostrarPorGenero']);
    Route::post('/cancion/reproducir', [CancionController::class, 'aumentarReproduccion']);
    Route::get('/artista/{id}/regalias', [RegaliasController::class, 'regaliasXArtista']);
    Route::get('/artista', [ArtistaController::class, 'showArtista']);
     // Rutas para Buscador
     Route::get('/buscador', [UsuarioController::class, 'buscador'])->name('buscador');
     Route::get('/buscar/resultados', [UsuarioController::class, 'realizarBusqueda'])->name('buscar.resultados');
 
});

// Rutas de administración
Route::middleware(['auth', PermisosAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdmin']);
    Route::post('/adminartista', [ArtistaController::class, 'store'])->name('guardarArtista');
    Route::get('/adminartista', [ArtistaController::class, 'index'])->name('admin.artista.index');
    Route::get('/album', [AlbumController::class, 'index'])->name('admin.album.index');
    Route::get('/album/{id}', [AlbumController::class, 'show']);
    Route::post('/album', [AlbumController::class, 'store'])->name('guardarAlbum');
    Route::get('/cancion/{id}', [CancionController::class, 'show']);
    Route::get('/cancion', [CancionController::class, 'index'])->name('admin.cancion.index');
    Route::post('/cancion', [CancionController::class, 'store'])->name('guardarCancion');
    Route::get('/genero', [GeneroController::class, 'index']);
    Route::get('/genero/{id}', [GeneroController::class, 'show']);
    Route::post('/genero', [GeneroController::class, 'store'])->name('guardarGenero');
    Route::get('/artista/{id}', [ArtistaController::class, 'show']);
    Route::get('/regalias', [RegaliasController::class, 'index']);
    Route::delete('/artista/{id}', [ArtistaController::class, 'destroy'])->name('artista.destroy');
    Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
    Route::delete('/cancion/{id}', [CancionController::class, 'destroy'])->name('cancion.destroy');

   
});

// Rutas de exploración
Route::middleware(['auth'])->group(function () {
    Route::get('/explorar', [ExplorarController::class, 'index'])->name('explorar');
    Route::get('/explorar/genero/{id}', [ExplorarController::class, 'cancionesPorGenero']);
    Route::get('/explorar/artista/{id}', [ExplorarController::class, 'cancionesPorArtista']);
});