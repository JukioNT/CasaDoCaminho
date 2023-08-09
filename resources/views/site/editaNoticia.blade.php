@extends('site.layout')
@section('title', 'Cadastrar Noticia')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Editar Noticia</h1>
        <form action="/noticias/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo da Noticia:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{$data->titulo}}">
                <label for="descricao">Descrição da Noticia:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="{{$data->descricao}}">
                <label for="imagem">Imagem da Noticia:</label>
                <input type="file" class="form-control" name="imagem" id="imagem">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection