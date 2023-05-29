<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Evento;

class homeController extends Controller
{
    public function index()
    {
        $noticia = Noticia::all();
        $evento = Evento::all();
        return view('site.home', compact('noticia', 'evento'));
    }
}
