@extends('site.layout')
@section('title', 'Eventos')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de Eventos</h1>
    @if (count($evento) == 0)
        <p style="text-align: center;">Não há eventos cadastradas</p>
        <a href="/eventos/cadastrar" class="btn btn-success">Novo evento</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/eventos/cadastrar" class="btn btn-success">Novo evento</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Código</td>
                        <td>Título</td>
                        <td>Descrição</td>
                        <td>Caminho da Imagem</td>
                        <td>Data do Evento</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evento as $item => $value)
                        <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['titulo'] }}</td>
                            <td>{{ $value['descricao'] }}</td>
                            <td>{{ $value['imagem'] }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($value['dataEvento'])) }}</td>
                            <td>
                                <a href="/eventos/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/eventos/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection