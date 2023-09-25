@extends('site.layout')
@section('title', 'Incrementa doação')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Incrementar Doação</h1>
        <form action="/tipodoacoes/incrementa/{{$data['id']}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Quantidade a incrementar:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" required/>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection