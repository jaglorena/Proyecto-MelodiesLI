<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{    public function showAdmin()
    {
        return view('admin');
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
