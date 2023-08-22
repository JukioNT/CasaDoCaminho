<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;


class registrarController extends Controller
{
    public function form(Request $request){
        $data = array();
        $data['cpf'] = $request->input('cpf');
        $data['id'] = $request->input('idcpf');
        return view('site.registrar', compact('data'));
        $rota = $request->route();
        dd( $rota);
    }

    public function store(Request $request)
    {
        $data = new Colaborador();
        $data->CPF = $request->input('CPF');
        $data->Nome = $request->input('Nome');
        $data->Endereco = $request->input('Endereco');
        $data->Telefone = $request->input('Telefone');
        $data->Nascimento = $request->input('Nascimento');
        $data->Email = $request->input('Email');
        $data->Disponibilidade = $request->input('Disponibilidade');
        $data->Religiao = $request->input('Religiao');
        $data->Afinidade = $request->input('Afinidade');
        $data->save();
        return redirect('/')->with('success', 'Colaborador cadasrado com sucesso');
    }
}
