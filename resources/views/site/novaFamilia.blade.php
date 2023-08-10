@extends('site.layout')
@section('title', 'Cadastrar Doação')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar nova Família</h1>
        <form action="/familias" method="POST">
            @csrf
            <div class="form-group">
                <label for="NomeResponsavel">Nome Responsável:</label>
                <input class="form-control" type="text" name="NomeResponsavel" id="NomeResponsavel">
                <label for="estadoCivil_id">Estado Civil:</label>
                <select class="form-select" aria-label="Default select example" id="estadoCivil_id" name="estadoCivil_id">
                    @foreach ($estadoCivil as $item)
                    <option value="{{$item->id}}">{{$item->estado_civil}}</option>
                    @endforeach
                </select>
                <label for="nomeCompanheiro">Nome Companheiro:</label>
                <input class="form-control" type="text" name="nomeCompanheiro" id="nomeCompanheiro">
                <label for="nascimento">Nascimento:</label>
                <input class="form-control" type="date" name="nascimento" id="nascimento">
                <label for="endereco">Endereço:</label>
                <input class="form-control" type="text" name="endereco" id="endereco">
                <label for="telefone">Telefone:</label>
                <input class="form-control" type="text" name="telefone" id="telefone">
                <label for="profissao">Profissão:</label>
                <input class="form-control" type="text" name="profissao" id="profissao">
                <label for="escolaridade_id">Escolaridade:</label>
                <select class="form-select" aria-label="Default select example" id="escolaridade_id" name="escolaridade_id">
                    @foreach ($escolaridade as $item)
                    <option value="{{$item->id}}">{{$item->escolaridade}}</option>
                    @endforeach
                </select>
                <label for="Nfilhos">Número de Filhos:</label>
                <input class="form-control" type="number" name="Nfilhos" id="Nfilhos">
                <label for="recebeajuda">Recebe Ajuda:</label>
                <select class="form-select" aria-label="Default select example" id="recebeajuda" name="recebeajuda">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection