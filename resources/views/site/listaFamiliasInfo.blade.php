@extends('site.layout')
@section('title', 'Familias')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de familias</h1>
    @if (count($familias) == 0)
        <p style="text-align: center;">Não há familias cadastradas</p>
        <a href="/familias/cadastrar" class="btn btn-success">Novo familia</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/familias/cadastrar" class="btn btn-success">Novo familia</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Nome do Responsável</td>
                        <td>Estado civil</td>
                        <td>Nome Companheiro</td>
                        <td>Nascimento Responsável</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Profissão</td>
                        <td>Escolaridade</td>
                        <td>Número de Filhos</td>
                        <td>Nome Filhos</td>
                        <td>Renda Familiar</td>
                        <td>Recebe Ajuda</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($familias as $item => $value)
                        <tr>
                            <td>{{ $value['NomeResponsavel'] }}</td>
                            <td>{{ $value['estado_civil'] }}</td>
                            <td>{{ $value['nomeCompanheiro'] }}</td>
                            <td>{{ date('d/m/Y H:i:s', strtotime($value['nascimento'])) }}</td>
                            <td>{{ $value['endereço'] }}</td>
                            <td>{{ $value['telefone'] }}</td>
                            <td>{{ $value['profissão'] }}</td>
                            <td>{{ $value['escolaridade'] }}</td>
                            <td>{{ $value['Nfilhos'] }}</td>
                            <td>{{ $value['nomes_filhos'] }}</td>
                            <td>{{ $value['rendafamiliar'] }}</td>
                            <td>{{ $value['recebeajuda'] }}</td>
                            <td>
                                <a href="/familias/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/familias/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection