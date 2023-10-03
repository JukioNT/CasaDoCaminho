<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\ColaboradorEvento;
use Exception;
use Illuminate\Support\Facades\Hash;

class registrarController extends Controller
{
    public function form(Request $request){
        $usuario = Colaborador::where('CPF', '=', $request->input('cpf'))->get();

        try{
            $test = $usuario[0]->id;

            $data = array();
            $data['cpf'] = $request->input('cpf');
            $data['id'] = $request->input('idprojeto');

            $eventoVerify = ColaboradorEvento::where('colaborador_id', '=', $usuario[0]->id)->where('evento_id', '=', $data['id'])->get();

            try{
                $test = $eventoVerify[0]->id;
                return redirect('/')->with('danger', 'Você já participa desse evento');
            }catch(Exception $e){
                return view('site.participarEvento', compact('data', 'usuario'));
            }
            
        }catch(Exception $e){
            $data = array();
            $data['cpf'] = $request->input('cpf');
            $data['id'] = $request->input('idprojeto');
            return view('site.registrar', compact('data'));
        }
    }

    public function registrarParticipar(Request $request)
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
        $data->Senha = Hash::make($request->input('Senha'));
        $data->save();

        $evento = new ColaboradorEvento();
        $evento->colaborador_id = $data->id;
        $evento->evento_id = $request->input('id');
        $evento->save();
        
        return redirect('/')->with('success', 'Colaborador cadastrado com sucesso');
    }
    
    public function participar(Request $request)
    {
        $colaborador = Colaborador::select('CPF', 'Email', 'Senha')
        ->from('colaboradors')
        ->where('CPF', '=', $request->input('CPF'))
        ->get();
        
        if(Hash::check($request->input('Senha'), $colaborador[0]->Senha)){
            $data = new ColaboradorEvento();
            $id = Colaborador::select('id')
                    ->from('colaboradors')
                    ->where('CPF', '=', $request->input('CPF'))
                    ->get();
            $data->colaborador_id = $id[0]->id;
            $data->evento_id = $request->input('id');
            $data->save();

            //Atualiza dados usuário
            $data = Colaborador::find($id[0]->id);
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

            return redirect('/')->with('success', 'Você está participando desse evento');
        }else{
            return redirect('/')->with('danger', 'Senha inválida');
        }
    }
}