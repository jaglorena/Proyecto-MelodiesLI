<?php
namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArtistaController extends Controller
{
    public function showArtista()
    {
        return view('artista');
    }

    public function index()
    {
        $generos = Genero::all();
        return view('crearartista', ['generos' => $generos]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nombre"    => "required",
            "biografia" => "required",
            "genero_id" => "required",
        ]);

        $resultado = Artista::create($validatedData);
        return redirect('/artista/' . $resultado->id);

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $artista = Artista::findOrFail($id);
        $artista->delete();

        return redirect()->route('admin.artista.index')->with('message', 'Artista eliminado correctamente.');
    }

    public function show($id)
    {
        $generos = Genero::all();
        return view('crearartista', ['artista' => Artista::find($id), 'generos' => $generos]);
    }
}
