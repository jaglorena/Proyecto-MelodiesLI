<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar iniciar sesión con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redireccionar según el rol del usuario
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirigir según el rol del usuario
            switch ($user->role) {
                case 'administrador':
                    return redirect()->intended('/admin');
                case 'artista':
                    return redirect()->intended('/artista');
                case 'cliente':
                default:
                    return redirect()->intended('/usuario');
            }
        }

        // Si la autenticación falla, regresar con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
