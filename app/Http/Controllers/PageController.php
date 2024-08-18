<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showWelcome()
    {
        return view('usuario');
    }
}
