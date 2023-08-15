<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registrarController extends Controller
{
    public function form(Request $request){
        $data = array();
        $data['cpf'] = $request->input('cpf');
        $data['id'] = $request->input('idcpf');
        return view('site.registrar', compact('data'));
    }
}
