@extends('site.layout')
@section('title', 'Cadastrar Noticia')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Lista de eventos</h1>
        <form action="/eventos/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo da Noticia:</label>
                <input class="form-control" name="titulo" id="titulo" value="{{$data->titulo}}">
                <label for="descricao">Descrição da Noticia:</label>
                <input class="form-control" name="descricao" id="descricao" value="{{$data->descricao}}">
                <label for="imagem">Imagem da Noticia:</label>
                <input type="file" class="form-control" name="imagem" id="imagem" value="{{$data->imagem}}">
                <label for="dataEvento">Imagem da Noticia:</label>
                <input type="datetime-local" class="form-control" name="dataEvento" id="dataEvento" value="{{$data->dataEvento}}">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection