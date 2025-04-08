<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use App\Models\Reproducciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CancionController extends Controller
{
    public function index()
    {
        $albumes  = Album::all();
        $artistas = Artista::all();
        return view("cancion", [
            "albumes"  => $albumes,
            "artistas" => $artistas,
        ]);
    }

    public function create()
    {
        return view("");

    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'titulo'     => 'required',
        'duracion'   => 'required',
        'album_id'   => 'required',
        'artista_id' => 'required',
        'archivo'    => 'required|mimes:mp3|max:10240', // máximo 10MB
    ]);

    // Guardar archivo en /public/song
    if ($request->hasFile('archivo')) {
        $file = $request->file('archivo');
        $nombre = Str::slug($request->titulo, '_') . '.mp3';
        $file->move(public_path('song'), $nombre);
        $validatedData['archivo'] = $nombre;
    }
    
    // Crear la canción
    $cancion = Cancion::create($validatedData);

    return redirect()->route('admin.cancion.index')->with('message', 'Canción guardada y archivo subido');
}


    public function show($id)
    {
        $albumes  = Album::all();
        $artistas = Artista::all();

        return view('cancion', ['cancion' => Cancion::findOrFail($id), 'albumes' => $albumes, 'artistas' => $artistas]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $cancion = Cancion::findOrFail($id);
        $cancion->delete();

        return redirect()->route('admin.cancion.index')->with('message', 'Canción eliminada correctamente.');
    }

    public function aumentarReproduccion(Request $request)
    {
        $id        = $request->id;
        $resultado = Reproducciones::where("cancion_id", $id)
            ->whereDay("fecha", Carbon::now()->day)
            ->whereMonth("fecha", Carbon::now()->month)
            ->whereYear("fecha", Carbon::now()->year)
            ->first();
        if (is_null($resultado)) {
            $data = [
                "fecha"                   => Carbon::now()->format("Y-m-d"),
                "cantidad_reproducciones" => 1,
                "cancion_id"              => $id,
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
