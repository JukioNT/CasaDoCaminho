@extends('site.layout')
@section('title', 'Tipo Doações')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de Produtos para Doação</h1>
    @if (count($tipoDoacao) == 0)
        <p style="text-align: center;">Não há produtos cadastradas</p>
        <a href="/tipodoacoes/cadastrar" class="btn btn-success">Novo produto</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/tipodoacoes/cadastrar" class="btn btn-success">Nova doação</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Descrição</td>
                        <td>Quantidade</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoDoacao as $item => $value)
                        <tr>
                            <td>{{ $value['tipo_doacao'] }}</td>
                            <td>{{ $value['quantidade'] }}</td>
                            <td>
                                <a href="/tipodoacoes/incrementaform/{{ $value['id'] }}" class="btn btn-success">Incrementar</a>
                                <a href="/doacoes/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/doacoes/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection