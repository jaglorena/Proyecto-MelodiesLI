<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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

    public function create() {}
    public function store(Request $request) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}

    public function mostrarPorGenero($id)
    {
        $artistasXGenero = Artista::where("genero_id", $id)->get();
        $cancionesXGenero = Cancion::whereIn('artista_id', $artistasXGenero->pluck('id'))->get();

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

    public function buscador()
    {
        return view('buscador');
    }

    public function realizarBusqueda(Request $request)
{
    $nombre = $request->input('nombre');

    // Buscar canción exacta
    $canciones = Cancion::where('titulo', 'ILIKE', "%$nombre%")->get();

    // Inicializar artistas y álbumes vacíos
    $artistas = collect();
    $albumes = collect();

    if ($canciones->count() === 1) {
        $cancion = $canciones->first();

        // Buscar artista relacionado
        $artista = Artista::find($cancion->artista_id);
        if ($artista) {
            $artistas->push($artista);
        }

        // Buscar álbum relacionado
        $album = Album::find($cancion->album_id);
        if ($album) {
            $albumes->push($album);
        }
    } elseif ($canciones->count() > 1) {
        // Si hay varias canciones, buscar artistas y álbumes relacionados
        $artistas = Artista::whereIn('id', $canciones->pluck('artista_id'))->get();
        $albumes = Album::whereIn('id', $canciones->pluck('album_id'))->get();
    }

    // Buscar artistas directamente por nombre
    $artistasDirectos = Artista::where('nombre', 'ILIKE', "%$nombre%")->get();
    if ($artistasDirectos->isNotEmpty()) {
        $artistas = $artistas->merge($artistasDirectos)->unique('id');

        // Canciones del artista
        $cancionesArtista = Cancion::whereIn('artista_id', $artistasDirectos->pluck('id'))->get();
        $canciones = $canciones->merge($cancionesArtista)->unique('id');

        // Álbumes del artista
        $albumesArtista = Album::whereIn('artista_id', $artistasDirectos->pluck('id'))->get();
        $albumes = $albumes->merge($albumesArtista)->unique('id');
    }

    // Buscar por género exacto
    $genero = Genero::whereRaw('LOWER(nombre) = ?', [strtolower($nombre)])->first();
    if ($genero) {
        $artistasGenero = Artista::where('genero_id', $genero->id)->get();
        $artistas = $artistas->merge($artistasGenero)->unique('id');

        $cancionesGenero = Cancion::whereIn('artista_id', $artistasGenero->pluck('id'))->get();
        $canciones = $canciones->merge($cancionesGenero)->unique('id');

        $albumesGenero = Album::whereIn('artista_id', $artistasGenero->pluck('id'))->get();
        $albumes = $albumes->merge($albumesGenero)->unique('id');
    }

    return view("buscador", [
        'canciones' => $canciones,
        'artistas'  => $artistas,
        'albumes'   => $albumes,
        'buscado'   => $nombre,
        'generoEncontrado' => $genero 

    ]);
}

}
