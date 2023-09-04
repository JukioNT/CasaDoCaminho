<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\ColaboradorEvento;


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
        $existingColaborador = Colaborador::where('CPF', $request->input('CPF'))->first();
    
        if ($existingColaborador){
            $evento = new ColaboradorEvento();
            $evento->colaborador_id = $existingColaborador->id;
            $evento->evento_id = $request->input('id');
            $evento->save();
    
            return redirect('/')->with('success', 'Colaborador atualizado com sucesso');
        } else {
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
    
            $evento = new ColaboradorEvento();
            $evento->colaborador_id = $data->id;
            $evento->evento_id = $request->input('id');
            $evento->save();
    
            return redirect('/')->with('success', 'Colaborador cadastrado com sucesso');
        }
    }    
}

//SELECT id FROM colaboradors WHERE colaboradors.CPF = '153.011.526-45';