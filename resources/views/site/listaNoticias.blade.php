@extends('site.layout')
@section('title', 'Noticias')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de noticias</h1>
    @if (count($noticia) == 0)
        <p style="text-align: center;">Não há noticias cadastradas</p>
        <a href="/noticias/cadastrar" class="btn btn-success">Nova noticia</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/noticias/cadastrar" class="btn btn-success">Nova noticia</a>
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
                                <a href="/noticias/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/noticias/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection