<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\ColaboradorEvento;


class registrarController extends Controller
{

    public function form(Request $request){
        $CPFVerify = Colaborador::where('CPF', '=', $request->input('cpf'));
        if(isset($CPFVerify)){

            $usuario = Colaborador::where('CPF', '=', $request->input('cpf'))->get(); 

            $colaboradorEventoVerify = ColaboradorEvento::select('id')
            ->where('evento_id', $request->input('idcpf'))
            ->where('colaborador_id', $usuario[0]->id)
            ->get();

            try{
                if($colaboradorEventoVerify[0]->id != null){
                    return redirect('/')->with('danger', 'Você já pariticipa desse evento');
                }
            }catch(Exception $e){
                $data = array();
                $data['cpf'] = $request->input('cpf');
                $data['id'] = $request->input('idcpf');
                return view('site.participar', compact('data'));
            }
        }
        $data = array();
        $data['cpf'] = $request->input('cpf');
        $data['id'] = $request->input('idcpf');
        return view('site.registrar', compact('data'));
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

    public function participar()
    {
        $data = new ColaboradorEvento();
        $data->colaborador_id = ColaboradorEvento::where('CPF', '=', $request->input('cpf'));
        $data->evento_id = $request->input('id');
        echo $data['colaborador_id'];
    }
}