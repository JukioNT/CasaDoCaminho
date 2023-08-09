<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filho;
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
        
        $filhos = Filho::select('filhos.Nome', 'filhos.Nascimento', 'familias.NomeResponsavel', DB::raw('YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(filhos.Nascimento))) AS idade'))
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
