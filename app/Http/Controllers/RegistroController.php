<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function showRegistro()
    {
        return view('registro');
    }

    public function registro(Request $request)
    {
        $validatedData = $request->validate([
            "nombre"       => "required",
            "email"        => "required",
            "password"     => "required",
            "tipo_usuario" => "required",
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['fecha_registro'] = Carbon::now();

        Usuario::create(
            $validatedData
        );

        return redirect()->route("login")->with('message', 'Usuario Registrado')
        ;
    }
}
