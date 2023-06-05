@extends('site.layout')
@section('title', 'Colaboradores')
@section('body')
<div class="container">
    <h1 class="py-4">Lista de eventos</h1>
    @if (count($colaborador) == 0)
        <p style="text-align: center;">Não há colaboradores cadastradas</p>
        <a href="#" class="btn btn-success">Novo colaborador</a>
    @else
        <div class="card-body" style="margin-top: 50px;">
            <a href="#" class="btn btn-success">Novo colaborador</a>
            <table class="table table-ordered table-hover" id="tabelaEventos">
                <thead>
                    <tr>
                        <td>Código</td>
                        <td>Título</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaborador as $item => $value)
                        <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['NomeResponsavel'] }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection