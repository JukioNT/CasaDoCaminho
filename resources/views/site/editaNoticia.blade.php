@extends('site.layout')
@section('title', 'Cadastrar Noticia')
@section('body')
    <div class="card-body">
        <form action="/noticias/{{$data->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo da Noticia:</label>
                <input for="text" class="form-control" name="titulo" id="titulo" value={{$data->titulo}}/>
                <label for="descricao">Descrição da Noticia:</label>
                <input for="text" class="form-control" name="descricao" id="descricao" value={{$data->descricao}}>
                <label for="imagem">Imagem da Noticia:</label>
                <input for="text" class="form-control" name="imagem" id="imagem" value={{$data->imagem}}>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        </form>
    </div>
@endsection