<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Escolaridade;
use App\Models\EstadoCivil;
use Illuminate\Support\Facades\DB;

class familiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familias = Familia::select('familias.id', 'familias.NomeResponsavel', 'familias.nascimento', 'estado_civils.estado_civil', 'familias.nomeCompanheiro')
        ->join('estado_civils', 'estado_civils.id', '=', 'familias.estadoCivil_id')
        ->join('escolaridades', 'escolaridades.id', '=', 'familias.escolaridade_id')
        ->join('filhos', 'familias.id', '=', 'filhos.familia_id')
        ->groupBy('familias.id')
        ->get();

        return view('site.listaFamilias', compact('familias'));
    }

    public function indexInfo(string $id)
    {
        $familias = Familia::select('familias.NomeResponsavel', 'estado_civils.estado_civil', 'familias.nomeCompanheiro', 'familias.nascimento', 'familias.endereço', 'familias.telefone', 'familias.profissão', 'escolaridades.escolaridade', 'familias.Nfilhos', DB::raw('GROUP_CONCAT(filhos.nome) AS nomes_filhos'), 'familias.rendafamiliar', 'familias.recebeajuda')
        ->join('estado_civils', 'estado_civils.id', '=', 'familias.estadoCivil_id')
        ->join('escolaridades', 'escolaridades.id', '=', 'familias.escolaridade_id')
        ->where('familias.id', '=', $id)
        ->join('filhos', 'familias.id', '=', 'filhos.familia_id')
        ->groupBy('familias.id')
        ->get();

        return view('site.listaFamiliasInfo', compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::all();
        $escolaridade = Escolaridade::all();
        $estadoCivil = EstadoCivil::all();
        return view('site.novaFamilia', compact('familias', 'escolaridade', 'estadoCivil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Familia();
        $data->NomeResponsavel = $request->input('NomeResponsavel');
        $data->estadoCivil_id = $request->input('estadoCivil_id');
        $data->nomeCompanheiro = $request->input('nomeCompanheiro');
        $data->nascimento = $request->input('nascimento');
        $data->endereco = $request->input('endereco');
        $data->telefone = $request->input('telefone');
        $data->profissao = $request->input('profissao');
        $data->escolaridade_id = $request->input('escolaridade_id');
        $data->Nfilhos = $request->input('Nfilhos');
        $data->recebeajuda = $request->input('recebeajuda');
        $data->save();
        return redirect('/familias/lista')->with('success', 'Familia cadastrada com sucesso');
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
