<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/admin', [AdminController::class, 'showAdmin']);
Route::get('/artista', [ArtistaController::class, 'showArtista']);
Route::get('/artista/{id}', [ArtistaController::class, 'show']);
Route::post('/adminartista', [ArtistaController::class, 'store'])->name('guardarArtista');
Route::get('/adminartista', [ArtistaController::class, 'index']);
Route::get('/cancion/{id}', [CancionController::class, 'show']);
Route::get('/cancion', [CancionController::class, 'index']);
Route::post('/cancion', [CancionController::class, 'store'])->name('guardarCancion');
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/album/{id}', [AlbumController::class, 'show']);
Route::post('/album', [AlbumController::class, 'store'])->name('guardarAlbum');
Route::get('/genero', [GeneroController::class, 'index']);
Route::get('/genero/{id}', [GeneroController::class, 'show']);
Route::post('/genero', [GeneroController::class, 'store'])->name('guardarGenero');
Route::get('/usuario/genero/{id}', [UsuarioController::class, 'mostrarPorGenero']);
Route::post('/cancion/reproducir', [CancionController::class, 'aumentarReproduccion']);
