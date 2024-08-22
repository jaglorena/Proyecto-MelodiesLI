<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController
{
    public function index()
    {
        return view('genero');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nombre" => "required",
        ]);

        $resultado = Genero::create($validatedData);
        return redirect('/genero/' . $resultado->id);
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
        return view('genero', ['genero' => Genero::find($id)]);
    }
}
