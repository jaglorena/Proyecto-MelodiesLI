<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistaController;


Route::get('/', [UsuarioController::class, 'showWelcome']);
Route::get('/admin', [AdminController::class, 'showAdmin']);
Route::get('/artista', [ArtistaController::class, 'showArtista']);


