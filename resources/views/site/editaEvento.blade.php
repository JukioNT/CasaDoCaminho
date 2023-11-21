@extends('site.layout')
@section('title', 'Editar Evento')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Editar Evento</h1>
        <form action="/eventos/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo da Noticia:</label>
                <input class="form-control" name="titulo" id="titulo" value="{{$data->titulo}}" required>
                <label for="descricao">Descrição da Noticia:</label>
                <input class="form-control" name="descricao" id="descricao" value="{{$data->descricao}}" required>
                <label for="imagem">Imagem da Noticia:</label>
                <input type="file" class="form-control" name="imagem" id="imagem" value="{{$data->imagem}}" required>
                <label for="dataEvento">Imagem da Noticia:</label>
                <input type="datetime-local" max="9999-12-31T23:59" class="form-control" name="dataEvento" id="dataEvento" value="{{$data->dataEvento}}" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </form>
    </div>
@endsection