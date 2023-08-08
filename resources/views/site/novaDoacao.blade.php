@extends('site.layout')
@section('title', 'Cadastrar Doação')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar nova Doação</h1>
        <form action="/doacoes" method="POST">
            @csrf
            <div class="form-group">
                <label for="doacao_id">Tipo da doação:</label>
                <select class="form-select" aria-label="Default select example" id="doacao_id" name="doacao_id">
                    @foreach ($tipoDoacao as $item)
                        <option value="{{$item->id}}">{{$item->tipo_doacao}}({{$item->quantidade}})</option>
                    @endforeach
                  </select>
                  <label for="quantidade">Quantidade a doar:</label>
                  <input class="form-control" type="number" name="quantidade" id="quantidade">
                  <label for="familia_id">Familia a doar:</label>
                  <select class="form-select" aria-label="Default select example" id="familia_id" name="familia_id">
                    @foreach ($familias as $item)
                        <option value="{{$item->id}}">{{$item->NomeResponsavel}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection