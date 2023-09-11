<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\ColaboradorEvento;
use Exception;


class registrarController extends Controller
{
    public function form(Request $request){
        $usuario = Colaborador::where('CPF', '=', $request->input('cpf'))->get();

        try{
            $test = $usuario[0]->id;

            $data = array();
            $data['cpf'] = $request->input('cpf');
            $data['id'] = $request->input('idcpf');
            return view('site.participarEvento', compact('data'));
            
        }catch(Exception $e){
            $data = array();
            $data['cpf'] = $request->input('cpf');
            $data['id'] = $request->input('idcpf');
            return view('site.registrar', compact('data'));
        }
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

        $evento = new ColaboradorEvento();
        $evento->colaborador_id = $data->id;
        $evento->evento_id = $request->input('id');
        $evento->save();
        
        return redirect('/')->with('success', 'Colaborador cadastrado com sucesso');
    }
    
    public function participar(Request $request)
    {
        $filhos = Colaborador::select('CPF', 'Email')
        ->from('colaboradors')
        ->where('CPF', '=', $request->input('CPF'))
        ->get();
        
        if($filhos[0]->Email == $request->input("Email")){
            try{
                $data = new ColaboradorEvento();
                $id = Colaborador::select('id')
                     ->from('colaboradors')
                     ->where('CPF', '=', $request->input('CPF'))
                     ->get();
                $data->colaborador_id = $id[0]->id;
                $data->evento_id = $request->input('id');
                $data->save();
                return redirect('/')->with('success', 'Você está participando desse evento');
            }catch(Exception $e){
                return redirect('/')->with('danger', 'Você já participa desse evento');
            }
        }else{
            return redirect('/')->with('danger', 'Email inválido');
        }
    }
}