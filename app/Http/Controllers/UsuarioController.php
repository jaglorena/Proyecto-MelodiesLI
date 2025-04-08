<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Genero;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function editarPerfil()
    {
        $usuario = Auth::user();
        return view('perfil', compact('usuario')); // Va a resources/views/perfil.blade.php
    }

    public function actualizarPerfil(Request $request)
    {
        $usuario = Auth::user();
        /** @var \App\Models\Usuario $usuario */

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuario,email,' . $usuario->id,
            'password' => 'nullable|string|min:5|confirmed'
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }

    public function listarUsuarios()
    {
        $usuario = Auth::user();
        /** @var \App\Models\Usuario $usuario */

        if ($usuario->tipo_usuario !== 'administrador') {
            abort(403, 'Acceso denegado.');
        }

        $usuarios = Usuario::all();
        return view('eliminarusuario', compact('usuarios'));
    }


    public function eliminar($id)
    {
        $usuario = Auth::user();
        /** @var \App\Models\Usuario $usuario */

        if ($usuario->tipo_usuario !== 'administrador') {
            abort(403, 'Acceso denegado.');
        }        

        $usuario = Usuario::findOrFail($id);

        if ($usuario->tipo_usuario === 'administrador') {
            return back()->with('error', 'No puedes eliminar a otros administradores.');
        }

        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
