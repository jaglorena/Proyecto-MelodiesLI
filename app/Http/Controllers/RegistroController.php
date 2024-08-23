<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;


class RegistroController extends Controller
{
    public function showRegistro()
    {
        return view('registro');
    }

    public function registro(Request $request)
    {       
        $validatedData = $request->validate([
            "nombre" => "required",
            "email" => "required",
            "password" => "required",
            "tipo_usuario" => "required", 
        ]);

        $validatedData['fecha_registro'] = Carbon::now();

        Usuario::create(
            $validatedData
        );

        return redirect()->route("login")->with('message', 'Usuario Registrado')
        ;
    }
}
