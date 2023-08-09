@extends('site.layout')
@section('title', 'Filhos')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de filhos</h1>
    @if (count($filhos) == 0)
        <p style="text-align: center;">Não há filhos cadastradas</p>
        <a href="/filhos/cadastrar" class="btn btn-success">Novo Filho</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/filhos/cadastrar" class="btn btn-success">Novo Filho</a>
            <table class="table table-ordered table-hover" id="tabelaFilhos">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Familia Pertencente</td>
                        <td>Data de Nascimento</td>
                        <td>Idade</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filhos as $item => $value)
                        <tr>
                            <td>{{ $value['Nome'] }}</td>
                            <td>{{ $value['NomeResponsavel'] }}</td>
                            <td>{{ date('d/m/Y', strtotime($value['Nascimento'])) }}</td>
                            <td>{{ $value['idade'] }}</td>
                            <td>
                                <a href="/filhos/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/filhos/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection