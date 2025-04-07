<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;

class AlbumController
{
    public function index()
    {
        $artistas = Artista::all();
        return view('album', ['artistas' => $artistas]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "titulo"            => "required",
            "fecha_lanzamiento" => "required",
            "artista_id"        => "required",
        ]);

        $resultado = Album::create($validatedData);
        return redirect('/album/' . $resultado->id);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('admin.album.index')->with('message', 'Album eliminado correctamente.');
    }

    public function show($id)
    {
        $artistas = Artista::all();

        return view('album', ['album' => Album::find($id), 'artistas' => $artistas]);
    }
}
