@extends('site.layout')
@section('title', 'Cadastrar Evento')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar novo Evento</h1>
        <form action="{{route('gravaNovoEvento')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo do Evento:</label>
                <input for="text" class="form-control" name="titulo" id="titulo"/>
                <label for="descricao">Descrição do Evento:</label>
                <input for="text" class="form-control" name="descricao" id="descricao">
                <label for="imagem">Imagem do Evento:</label>
                <input for="text" class="form-control" name="imagem" id="imagem">
                <label for="dataEvento">Data e hora do evento:</label>
                <input type="datetime-local" class="form-control" name="dataEvento" id="dataEvento">
                
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection