@extends('site.layout')
@section('title', 'Cadastrar Doação')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar nova Doação</h1>
        <form action="{{route('gravaNovaDoacao')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao"/>
                <label for="descricao">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection