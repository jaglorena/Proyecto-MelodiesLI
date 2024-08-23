<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function showWelcome()
    {
        return view('usuario');
    }

    public function index() {
        return view("usuario");
    }

    public function create() {
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
