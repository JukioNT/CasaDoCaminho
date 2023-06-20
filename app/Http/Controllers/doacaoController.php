<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doacao;

class doacaoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doacao = Doacao::all();
        return view('site.listaDoacoes', compact('doacao'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.novaDoacao');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Doacao();
        $data->descricao = $request->input('descricao');
        $data->quantidade = $request->input('quantidade');
        $data->save();
        return redirect('/doacoes/lista')->with('success', 'Doação cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
