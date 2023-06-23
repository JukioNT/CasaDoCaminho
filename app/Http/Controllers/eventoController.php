<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Evento;
use Carbon\Carbon;


class eventoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evento = Evento::all();
        return view('site.listaEventos', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.novoEvento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('imagem')->store('images', 'public');
        $data = new Evento();
        $data->titulo = $request->input('titulo');
        $data->descricao = $request->input('descricao');
        $data->imagem = $path;
        $dataConvertida = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('dataEvento'));
        $data->dataEvento = $dataConvertida->format('Y-m-d H:i:s');
        $data->save();
        return redirect('/eventos/lista')->with('success', 'Evento cadastrado com sucesso');
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
        $data = Evento::find($id);
        if(isset($data)){
            $evento = $data;
            $dataConvertida = Carbon::createFromFormat('Y-m-d H:i:s', $evento->dataEvento);
            $evento->dataEvento = $dataConvertida->format('Y-m-d\TH:i');
            $data->evento = $evento;
            return view('site.editaEvento', compact('data'));
        }
        return redirect('/eventos/lista')->with('danger', 'Erro ao editar o evento');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Evento::find($id);
        if(isset($data)){
            $data->titulo = $request->input('titulo');
            $data->descricao = $request->input('descricao');
            $file = $request->file('imagem');
            if(isset($file)){
                $filename = 'images/'.date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('storage/images'), $filename);
                $data->imagem = $filename;
            }
            $data->dataEvento = $request->input('dataEvento');
            $data->save();
        }else{
            return redirect('/eventos/lista')->with('danger', 'Erro ao editar o evento');
        }
        return redirect('/eventos/lista')->with('success', 'Evento editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Evento::find($id);
        if(isset($data)){
            $imagem = $data->imagem;    
            Storage::disk('public')->delete($imagem);
            $data->delete();
        }else{
            return redirect('/eventos/lista')->with('danger', 'Erro ao deletar o evento');
        }
        return redirect('/eventos/lista')->with('success', 'Evento deletado com sucesso');
    }
}
