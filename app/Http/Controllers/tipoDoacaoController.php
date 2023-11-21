<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDoacao;

class tipoDoacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoDoacao = TipoDoacao::all();
        return view('site.listaTipoDoacoes', compact('tipoDoacao'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.novoTipoDoacao');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new TipoDoacao();
        $data->tipo_doacao = $request->input('tipo_doacao');
        $data->quantidade = $request->input('quantidade');
        $data->save();
        return redirect('/tipodoacoes/lista')->with('success', 'Produto cadastrado com sucesso');
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
        $data = TipoDoacao::find($id);
        if(isset($data)){
            return view('site.editaTipoDoacoes', compact('data'));
        }
        return redirect('/tipodoacoes/lista')->with('danger', 'Erro ao editar produto');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TipoDoacao::find($id);
        if(isset($data)){
            $data->tipo_doacao = $request->input('tipo_doacao');
            $data->quantidade = $request->input('quantidade');
            $data->save();
        }else{
            return redirect('/tipodoacoes/lista')->with('danger', 'Erro ao editar produto');
        }
        return redirect('/tipodoacoes/lista')->with('success', 'Produto editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TipoDoacao::find($id);
        if(isset($data)){
            $data->delete();
        }else{
            return redirect('/tipodoacoes/lista')->with('danger', 'Erro ao deletar produto');
        }
        return redirect('/tipodoacoes/lista')->with('success', 'Produto deletado com sucesso');
    }

    public function form(Request $request, string $id){
        $data = array();
        $data['id'] = $id;
        return view('site.incrementaTipoDoacao', compact('data'));
    }

    public function increment(Request $request, string $id){
        $data = TipoDoacao::find($id);
        $data->quantidade = $data->quantidade + $request->input('quantidade');
        $data->save();
        return redirect('/tipodoacoes/lista')->with('success', 'Doação incrementada com sucesso');
    }
}
