<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class noticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticia = Noticia::all();
        return view('site.listaNoticias', compact('noticia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.novaNoticia');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Noticia();
        $data->titulo = $request->input('titulo');
        $data->descricao = $request->input('descricao');
        $data->imagem = $request->input('imagem');
        $data->save();
        return redirect('/noticias/lista')->with('success', 'Noticia cadastrada com sucesso');
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
        $data = Noticia::find($id);
        if(isset($data)){
            $noticia = Noticia::all();
            $data->noticias = $noticia;
            return view('site.editaNoticia', compact('data'));
        }
        return redirect('/noticias/lista')->with('danger', 'Erro ao editar a noticia');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Noticia::find($id);
        if(isset($data)){
            $data->titulo = $request->input('titulo');
            $data->descricao = $request->input('descricao');
            $data->imagem = $request->input('imagem');
            $data->save();
        }else{
            return redirect('/noticias/lista')->with('danger', 'Erro ao editar a noticia');
        }
        return redirect('/noticias/lista')->with('success', 'Noticia editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Noticia::find($id);
        if(isset($data)){
            $data->delete();
        }else{
            return redirect('/noticias/lista')->with('danger', 'Erro ao deletar a noticia');
        }
        return redirect('/noticias/lista')->with('success', 'Noticia deletada com sucesso');
    }
}
