<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class RegaliasController extends Controller
{
    public function index()
    {
        // Fijamos el monto por reproducción 
        $montoFijo = 0.5;

        $reproducciones = DB::table("reproducciones")
            ->join("cancion", "cancion.id", "=", "reproducciones.cancion_id")
            ->select("cancion.titulo", "reproducciones.cantidad_reproducciones")
            ->get();

        return view("regalias", [
            "monto" => $montoFijo,
            "reproducciones" => $reproducciones
        ]);
    }

    public function regaliasXArtista($id)
    {
        $montoFijo = 1;

        $reproducciones = DB::table("reproducciones")
            ->join("cancion", "cancion.id", "=", "reproducciones.cancion_id")
            ->join("artista", "cancion.artista_id", "=", "artista.id")
            ->where("artista.id", "=", $id)
            ->select("cancion.titulo", "reproducciones.cantidad_reproducciones")
            ->get();

        return view("regalias", [
            "monto" => $montoFijo,
            "reproducciones" => $reproducciones
        ]);
    }
}
