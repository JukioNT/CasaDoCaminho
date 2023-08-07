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
        $data->save();
        return redirect('/tipodoacoes/lista')->with('success', 'Doação cadastrada com sucesso');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
