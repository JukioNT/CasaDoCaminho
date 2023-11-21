@extends('site.layout')
@section('title', 'Cadastrar Noticia')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar nova Noticia</h1>
        <form action="{{route('gravaNovaNoticia')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo da Noticia:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" required/>
                <label for="descricao">Descrição da Noticia:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
                <label for="imagem">Imagem da Noticia:</label>
                <input type="file" class="form-control" name="imagem" id="imagem" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </form>
    </div>
@endsection