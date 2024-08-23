<?php

namespace App\Http\Controllers;

use App\Models\Regalias;
use DB;

class RegaliasController
{
    public function index()
    {
        $monto = Regalias::first();
        $reproducciones = DB::table("reproducciones")
            ->join("cancion", "cancion.id", "=", "reproducciones.cancion_id")
            ->get();

        return view("regalias", ["monto" => $monto, "reproducciones" => $reproducciones]);
    }

    public function regaliasXArtista($id)
    {
        $monto = Regalias::first();
        $reproducciones = DB::table("reproducciones")
            ->join("cancion", "cancion.id", "=", "reproducciones.cancion_id")
            ->join("artista", "cancion.artista_id", "=", "artista.id")
            ->where("artista.id", "=", $id)
            ->get();
        return view("regalias", ["monto" => $monto, "reproducciones" => $reproducciones]);
    }
}
