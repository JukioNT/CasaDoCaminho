@extends('site.layout')
@section('title', 'Familias')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de familias</h1>
    @if (count($familias) == 0)
        <p style="text-align: center;">Não há familias cadastradas</p>
        <a href="/familias/cadastrar" class="btn btn-success">Nova familia</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="/familias/cadastrar" class="btn btn-success">Nova familia</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Nome do Responsável</td>
                        <td>Estado civil</td>
                        <td>Nome Companheiro</td>
                        <td>Nascimento Responsável</td>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($familias as $item => $value)
                        <tr>
                            <td>{{ $value['NomeResponsavel'] }}</td>
                            <td>{{ $value['estado_civil'] }}</td>
                            <td>{{ $value['nomeCompanhiero'] }}</td>
                            <td>{{ date('d/m/Y', strtotime($value['nascimento'])) }}</td>
                            <td>
                                <a href="/familias/editar/{{ $value['id'] }}" class="btn btn-primary">Editar</a>
                                <a href="/familias/deletar/{{ $value['id'] }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                                <a href="/familias/info/{{ $value['id'] }}" type="button" class="btn btn-info" style="color: white" >Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection