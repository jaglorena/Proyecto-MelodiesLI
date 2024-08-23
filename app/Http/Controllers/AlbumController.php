<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController
{
    public function index()
    {
        return view('album');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "titulo" => "required",
            "fecha_lanzamiento" => "required",
            "artista_id" => "required",
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

    }

    public function show($id)
    {
        return view('album', ['album' => Album::find($id)]);
    }
}
