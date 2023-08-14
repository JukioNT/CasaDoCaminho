@extends('site.layout')
@section('title', 'Editar Família')
@section('body')
<pre>
    {{ $data }}
</pre>
    <div class="card-body container">
        <h1 class="py-4">Editar Família</h1>
        <form action="/familias/{{$data->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NomeResponsavel">Nome Responsável:</label>
                <input value="{{$data->NomeResponsavel}}" class="form-control" type="text" name="NomeResponsavel" id="NomeResponsavel">
                <label for="estadoCivil_id">Estado Civil:</label>
                <select class="form-select" aria-label="Default select example" id="estadoCivil_id" name="estadoCivil_id" onchange="hide()">
                    @foreach ($estadoCivil as $item)
                    <option {{ $data->estadoCivil_id == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->estado_civil}}</option>
                    @endforeach
                </select>
                <label for="nomeCompanheiro" style="display:none">Nome Companheiro:</label>
                <input value="{{$data->nomeCompanheiro}}" class="form-control" type="hidden" name="nomeCompanheiro" id="nomeCompanheiro">
                <label for="nascimento">Nascimento:</label>
                <input value="{{$data->nascimento}}" class="form-control" type="date" name="nascimento" id="nascimento">
                <label for="endereco">Endereço:</label>
                <input value="{{$data->endereco}}" class="form-control" type="text" name="endereco" id="endereco">
                <label for="telefone">Telefone:</label>
                <input value="{{$data->telefone}}" class="form-control" type="text" name="telefone" id="telefone">
                <label for="profissao">Profissão:</label>
                <input value="{{$data->profissao}}" class="form-control" type="text" name="profissao" id="profissao">
                <label for="escolaridade_id">Escolaridade:</label>
                <select class="form-select" aria-label="Default select example" id="escolaridade_id" name="escolaridade_id">
                    @foreach ($escolaridade as $item)
                    <option {{ $data->escolaridade_id == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->escolaridade}}</option>
                    @endforeach
                </select>
                <label for="Nfilhos">Número de Filhos:</label>
                <input value="{{$data->Nfilhos}}" class="form-control" type="number" name="Nfilhos" id="Nfilhos">
                <label for="recebeajuda">Recebe Ajuda:</label>
                <select class="form-select" aria-label="Default select example" id="recebeajuda" name="recebeajuda">
                    <option {{ $data->recebeajuda == 'S' ? 'selected' : '' }} value="S">Sim</option>
                    <option {{ $data->recebeajuda == 'N' ? 'selected' : '' }} value="N">Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', hide);
    function hide(){
        var select = document.getElementById('estadoCivil_id')
        console.log(select)
        var label = document.querySelector('label[for="nomeCompanheiro"]');
        console.log(label)
        var input = document.getElementById('nomeCompanheiro');
        console.log(input)
        if(select.value != 2) {
            label.style.display = 'none';
            input.type = 'hidden';
        }else {
            label.style.display = '';
            input.type = 'text';
        }
    }
</script>
@endsection