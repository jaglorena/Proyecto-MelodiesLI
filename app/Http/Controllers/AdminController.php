<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $artistas = Artista::all();
        $canciones = DB::table("cancion")
            ->join("artista", "artista.id", "=", "cancion.artista_id")
            ->get();
        return view('admin', ["artistas" => $artistas, "canciones" => $canciones]);
    }

    public function editAdmin(Request $request)
    {

    }

    public function index()
    {
        return view("");
    }

    public function create()
    {
        return view("");
    }

    public function store(Request $request)
    {

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
