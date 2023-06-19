<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;

class colaboradorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaborador = Colaborador::all();
        return view("site.listaColaboladores", compact('colaborador'));     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.novoColaborador');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Colaborador();
        $data->Nome = $request->input('Nome');
        $data->Endereco = $request->input('Endereco');
        $data->Telefone = $request->input('Telefone');
        $data->Nascimento = $request->input('Nascimento');
        $data->Email = $request->input('Email');
        $data->Disponibilidade = $request->input('Disponibilidade');
        $data->Religiao = $request->input('Religiao');
        $data->Afinidade = $request->input('Afinidade');
        $data->save();
        return redirect('/colaboradores/lista')->with('success', 'Colaborador cadasrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Colaborador::find($id);
        if(isset($data)){
            return view('site.editaColaborador', compact('data'));
        }
        return redirect('/colaborador/lista')->with('danger', 'Erro ao editar o colaborador');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Colaborador::find($id);
        if(isset($data)){
            $data->Nome = $request->input('Nome');
            $data->Endereco = $request->input('Endereco');
            $data->Telefone = $request->input('Telefone');
            $data->Nascimento = $request->input('Nascimento');
            $data->Email = $request->input('Email');
            $data->Disponibilidade = $request->input('Disponibilidade');
            $data->Religiao = $request->input('Religiao');
            $data->Afinidade = $request->input('Afinidade');
            $data->save();
        }else{
            return redirect('/colaboradores/lista')->with('danger', 'Erro ao editar o colaborador');
        }
        return redirect('/colaboradores/lista')->with('success', 'Colaborador editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Colaborador::find($id);
        if(isset($data)){
            $data->delete();
        }else{
            return redirect('/colaboradores/lista')->with('danger', 'Erro ao deletar o Colaborador');
        }
        return redirect('/colaboradores/lista')->with('success', 'Colaborador deletado com sucesso');
    }
}
