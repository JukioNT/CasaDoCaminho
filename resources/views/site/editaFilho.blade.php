@extends('site.layout')
@section('title', 'Editar Filho')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Editar Filho</h1>
        <form action="/filhos/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$data->nome}}">
                <label for="nascimento">Idade:</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento" value="{{$data->nascimento}}">
                <label for="familia_id">Familia Pertencente:</label>
                <select class="form-select" aria-label="default select example" id="familia_id" name="familia_id">
                    @foreach ($familias as $item)
                        <option {{ $data->familia_id == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->NomeResponsavel}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection