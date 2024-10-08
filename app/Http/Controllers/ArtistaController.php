<?php

namespace App\Http\Controllers;

use App\Models\Artista;
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
        return view('crearartista');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => "required",
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

    }

    public function show($id)
    {
        return view('crearartista', ['artista' => Artista::find($id)]);
    }
}
