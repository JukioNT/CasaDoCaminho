@extends('site.layout')
@section('title', 'Cadastrar Evento')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar novo Evento</h1>
        <form action="{{route('gravaNovoEvento')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo do Evento:</label>
                <input for="text" class="form-control" name="titulo" id="titulo" required/>
                <label for="descricao">Descrição do Evento:</label>
                <input for="text" class="form-control" name="descricao" id="descricao" required>
                <label for="imagem">Imagem do Evento:</label>
                <input type="file" class="form-control" name="imagem" id="imagem" required>
                <label for="dataEvento">Data e hora do evento:</label>
                <input type="datetime-local" max="9999-12-31T23:59" class="form-control" name="dataEvento" id="dataEvento" required>
                
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </form>
    </div>
@endsection