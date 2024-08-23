<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Genero;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuarioController extends Controller
{
    public function showUsuario()
    {
        return view("usuario", [
            'artistas' => Artista::all(),
            'canciones' => Cancion::all(),
            'generos' => Genero::all(),
            'top' => $this->obtenerTopCinco(),
        ]);
    }

    public function create()
    {
        return view("");

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function mostrarPorGenero($id)
    {
        $artistasXGenero = Artista::where("genero_id", $id)->get();

        $cancionesXGenero = DB::table("artista")
            ->where("genero_id", $id)
            ->join("cancion", "cancion.artista_id", "=", "artista.id")
            ->get();

        return view("usuario", [
            'artistas' => $artistasXGenero,
            'canciones' => $cancionesXGenero,
            'generos' => Genero::all(),
            'top' => $this->obtenerTopCinco(),
        ]);
    }

    private function obtenerTopCinco()
    {
        return DB::table("reproducciones")
            ->orderBy("cantidad_reproducciones", "desc")
            ->join("cancion", "cancion.id", "=", "reproducciones.cancion_id")
            ->take(5)
            ->get(["cancion.titulo"]);
    }
}
