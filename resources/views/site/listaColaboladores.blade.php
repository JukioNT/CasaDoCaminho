@extends('site.layout')
@section('title', 'Colaboradores')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de Colaboradores</h1>
    @if (count($colaborador) == 0)
        <p style="text-align: center;">Não há colaboradores cadastradas</p>
        <a href="/colaboradores/cadastrar" class="btn btn-success">Novo colaborador</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/colaboradores/cadastrar" class="btn btn-success">Novo colaborador</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Telefone</td>
                        <td>Nascimento</td>
                        <td>Email</td>
                        <td>Disponibilidade</td>
                        <td>Religião</td>
                        <td>Afinidade</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaborador as $item => $value)
                        <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['Nome'] }}</td>
                            <td>{{ $value['Endereco'] }}</td>
                            <td>{{ $value['Telefone'] }}</td>
                            <td>{{ $value['Nascimento'] }}</td>
                            <td>{{ $value['Email'] }}</td>
                            <td>{{ $value['Disponibilidade'] }}</td>
                            <td>{{ $value['Religiao'] }}</td>
                            <td>{{ $value['Afinidade'] }}</td>
                            <td>
                                <a href="/colaboradores/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/colaboradores/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection