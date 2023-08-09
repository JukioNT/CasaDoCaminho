@extends('site.layout')
@section('title', 'Editar Doações')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Editar noticia</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Tipo da doação:</label>
                <select class="form-select" aria-label="Default select example" id="doacao_id" name="doacao_id">
                    @foreach ($tipoDoacao as $item)
                        <option {{ $item->id == $doacoes[0]['doacao_id'] ? 'selected' : '' }} value="{{$item->id}}">{{$item->tipo_doacao}}({{$item->quantidade}})</option>
                    @endforeach
                  </select>
                  <select class="form-select" aria-label="Default select example" id="familia_id" name="familia_id">
                    @foreach ($familias as $item)
                        <option {{ $item->id == $doacoes[0]['doacao_id'] ? 'selected' : '' }} value="{{$item->id}}">{{$item->NomeResponsavel}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection