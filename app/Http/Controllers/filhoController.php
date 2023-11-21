<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filho;
use App\Models\Familia;
use Illuminate\Support\Facades\DB;


class filhoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $filhos = Filho::select('filhos.id', 'filhos.Nome', 'filhos.Nascimento', 'familias.NomeResponsavel', DB::raw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(filhos.Nascimento))) AS idade'))
        ->join('familias', 'filhos.familia_id', '=', 'familias.id')
        ->orderBy('familias.NomeResponsavel')
        ->get();

        return view('site.listaFilhos', compact('filhos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $familias = Familia::all();
        foreach($familias as $familia){
            $filhos = Filho::select('filhos.id')->where('filhos.familia_id', '=', $familia->id)->get();
            $nFilhos = count($filhos);
            $familia['nFilhos'] = $nFilhos;
        }
        return view('site.novoFilho', compact('familias', 'filhos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Filho();
        $data->nome = $request->input('nome');
        $data->nascimento = $request->input('nascimento');
        $data->familia_id = $request->input('familia_id');
        $data->save();
        return redirect('/filhos/lista')->with('success', 'Filho cadastrado com sucesso');
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
        $data = Filho::find($id);
        $familias = Familia::all() ;
        if(isset($data)){
            return view('site.editaFilho', compact('data', 'familias'));
        }
        return redirect('/filho/lista')->with('danger', 'Erro ao editar filho');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Filho::find($id);
        if(isset($data)){
            $data->nome = $request->input('nome');
            $data->nascimento = $request->input('nascimento');
            $data->familia_id = $request->input('familia_id');
            $data->save();
        }else{
            return redirect('/filhos/lista')->with('danger', 'Erro ao editar Filho');
        }
        return redirect('/filhos/lista')->with('success', 'Filho editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Filho::find($id);
        if(isset($data)){
            $data->delete();
        }else{
            return redirect('/filhos/lista')->with('danger', 'Erro ao deletar o Filho');
        }
        return redirect('/filhos/lista')->with('success', 'Filho deletado com sucesso');
    }
}
