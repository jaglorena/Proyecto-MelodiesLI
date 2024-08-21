<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function showArtista()
    {
        return view('artista');
    }
}

