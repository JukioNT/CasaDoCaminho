<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doacao;
use App\Models\Familia;
use App\Models\TipoDoacao;
use App\Http\Controllers\tipoDoacaoController;

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
        $doacoes = Doacao::select('familias.NomeResponsavel', 'tipo_doacaos.tipo_doacao', 'doacaos.created_at', 'doacaos.id')
        ->join('familias', 'familias.id', '=', 'doacaos.familia_id')
        ->join('tipo_doacaos', 'doacaos.doacao_id', '=', 'tipo_doacaos.id')
        ->orderBy('doacaos.created_at', 'desc')
        ->get();
        return view('site.listaDoacoes', compact('doacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::all();
        $tipoDoacao = TipoDoacao::all();
        return view('site.novaDoacao', compact('familias', 'tipoDoacao'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Doacao();
        $data->doacao_id = $request->input('doacao_id');
        $data->familia_id = $request->input('familia_id');
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
        $doacoes = Doacao::select('familias.NomeResponsavel', 'doacaos.doacao_id', 'doacaos.created_at', 'doacaos.id')
        ->join('familias', 'familias.id', '=', 'doacaos.familia_id')
        ->join('tipo_doacaos', 'familias.id', '=', 'tipo_doacaos.id')
        ->where('doacaos.id', '=', $id)
        ->orderBy('doacaos.created_at', 'desc')
        ->get();
        $doacoes = json_decode($doacoes, true);
        $familias = Familia::all();
        $tipoDoacao = TipoDoacao::all();
        if(isset($familias) || isset($tipoDoacao)){
            return view('site.editaDoacoes', compact('familias', 'tipoDoacao', 'doacoes'));
        }
        return redirect('/doacoes/lista')->with('danger', 'Erro ao editar a doação');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Doacao::find($id);
        if(isset($data)){
            $data->doacao_id = $request->input('doacao_id');
            $data->familia_id = $request->input('familia_id');
            $data->save();
        }else{
            return redirect('/doacoes/lista')->with('danger', 'Erro ao editar Doação');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
