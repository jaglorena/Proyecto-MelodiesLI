<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Reproducciones;
use Carbon\Carbon;
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

    public function aumentarReproduccion(Request $request)
    {
        $id = $request->id;
        $resultado = Reproducciones::where("cancion_id", $id)
            ->whereDay("fecha", Carbon::now()->day)
            ->whereMonth("fecha", Carbon::now()->month)
            ->whereYear("fecha", Carbon::now()->year)
            ->first();
        if (is_null($resultado)) {
            $data = [
                "fecha" => Carbon::now()->format("Y-m-d"),
                "cantidad_reproducciones" => 1,
                "cancion_id" => $id,
            ];
            Reproducciones::create($data);
            return response()->json(["mensaje" => "Reproduccion registrada"], 200);
        } else {
            $resultado->cantidad_reproducciones += 1;
            $resultado->save();
            return response()->json(["mensaje" => "Reproduccion actualizada"], 200);
        }
    }

}
