<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $credentials["email"];
        $password = $credentials["password"];
        $usuario = Usuario::where('email', $email)->first();
        if ($password == $usuario->password) {
            $request->session()->regenerate();

            switch ($usuario->tipo_usuario) {
                case 'administrador':
                    return redirect()->intended('/admin');
                case 'artista':
                    return redirect()->intended('/artista');
                case 'cliente':
                    return redirect()->intended('/usuario');
                default:
                    return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
