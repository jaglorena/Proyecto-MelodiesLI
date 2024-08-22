<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CancionController extends Controller
{
    public function index()
    {
        return view("cancion");
    }

    public function create()
    {
        return view("");

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "titulo" => "required",
            "duracion" => "required",
            "album_id" => "required",
            "artista_id" => "required",
        ]);

        $resultado = Cancion::create($validatedData);
        return redirect('/cancion/' . $resultado->id);
    }

    public function show($id)
    {
        return view('cancion', ['cancion' => Cancion::findOrFail($id)]);
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

}
