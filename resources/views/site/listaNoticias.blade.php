@extends('site.layout')
@section('title', 'Noticias')
@section('body')
<div class="container">
    <h1 class="py-3">Lista de noticias</h1>
    <div class="card-body">
        <table class="table table-ordered table-hover" id="tabelaNoticias">
            <thead>
                <tr>
                    <td>Código</td>
                    <td>Título</td>
                    <td>Descrição</td>
                    <td>Caminho da Imagem</td>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticia as $item => $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['titulo'] }}</td>
                        <td>{{ $value['descricao'] }}</td>
                        <td>{{ $value['imagem'] }}</td>
                        <td>
                            <a href="/noticias/editar/{{ $value['id'] }}">Editar</a>
                            <a href="/noticias/deletar/{{ $value['id'] }}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection