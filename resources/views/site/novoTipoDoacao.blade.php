@extends('site.layout')
@section('title', 'Cadastrar Tipo Doação')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar novo Produto para Doação</h1>
        <form action="{{route('gravaNovoTipoDoacao')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Tipo da doação:</label>
                <input type="text" class="form-control" name="tipo_doacao" id="tipo_doacao" required/>
                <label for="descricao">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" required min="0">
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </form>
    </div>
@endsection