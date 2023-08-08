@extends('site.layout')
@section('title', 'Doações')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de Doações</h1>
    @if (count($doacoes) == 0)
        <p style="text-align: center;">Não há doações cadastradas</p>
        <a href="/doacoes/cadastrar" class="btn btn-success">Nova doação</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/doacoes/cadastrar" class="btn btn-success">Nova doação</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Tipo Doação</td>
                        <td>Família Beneficiada</td>
                        <td>Data doação</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doacoes as $item => $value)
                        <tr>
                            <td>{{ $value['tipo_doacao'] }}</td>
                            <td>{{ $value['NomeResponsavel'] }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($value['created_at'])) }}</td>
                            <td>
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