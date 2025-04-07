<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Album;
use Illuminate\Routing\Controller;

class ExplorarController extends Controller
{
    public function index() {
        $generos = Genero::all();
        $artistas = Artista::all();
        return view('explorar', compact('generos', 'artistas'));
    }

    public function cancionesPorGenero($id) {
        $artistas = Artista::where('genero_id', $id)->pluck('id');
        $canciones = Cancion::whereIn('artista_id', $artistas)->with('album', 'artista')->get();
        return response()->json($canciones);
    }

    public function cancionesPorArtista($id) {
        $canciones = Cancion::where('artista_id', $id)->with('album', 'artista')->get();
        return response()->json($canciones);
    }
}
