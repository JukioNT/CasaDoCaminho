@extends('site.layout')
@section('title', 'Cadastrar Família')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Adicionar nova Família</h1>
        <form action="/familias" method="POST">
            @csrf
            <div class="form-group">
                <label for="NomeResponsavel">Nome Responsável:</label>
                <input class="form-control" type="text" name="NomeResponsavel" id="NomeResponsavel" required>
                <label for="estadoCivil_id">Estado Civil:</label>
                <select class="form-select" aria-label="Default select example" id="estadoCivil_id" name="estadoCivil_id" onchange="hide()">
                    @foreach ($estadoCivil as $item)
                    <option value="{{$item->id}}">{{$item->estado_civil}}</option>
                    @endforeach
                </select>
                <label for="nomeCompanheiro" style="display:none">Nome Companheiro:</label>
                <input class="form-control" type="hidden" name="nomeCompanheiro" id="nomeCompanheiro" required>
                <label for="nascimento">Nascimento:</label>
                <input class="form-control" type="date" name="nascimento" id="nascimento" required>
                <label for="endereco">Endereço:</label>
                <input class="form-control" type="text" name="endereco" id="endereco" required>
                <label for="telefone">Telefone:</label>
                <input class="form-control" type="text" name="telefone" id="telefone" required>
                <label for="profissao">Profissão:</label>
                <input class="form-control" type="text" name="profissao" id="profissao" required>
                <label for="escolaridade_id">Escolaridade:</label>
                <select class="form-select" aria-label="Default select example" id="escolaridade_id" name="escolaridade_id">
                    @foreach ($escolaridade as $item)
                    <option value="{{$item->id}}">{{$item->escolaridade}}</option>
                    @endforeach
                </select>
                <label for="Nfilhos">Número de Filhos:</label>
                <input class="form-control" type="number" name="Nfilhos" id="Nfilhos" required>
                <label for="renda">Renda Familiar:</label>
                <input class="form-control" type="number" name="renda" id="renda" required>
                <label for="recebeajuda">Recebe Ajuda:</label>
                <select class="form-select" aria-label="Default select example" id="recebeajuda" name="recebeajuda" required>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        </form>
    </div>
@endsection

@section('script')
<script type="module">
    $().ready(function() {
    let numberMask = new Inputmask('+99(99)99999-9999')
    numberMask.mask('#telefone')
    });
</script>
<script>
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