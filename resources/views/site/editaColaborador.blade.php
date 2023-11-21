@extends('site.layout')
@section('title', 'Cadastrar Colaborador')
@section('body')
    <div class="card-body container">
        <h1 class="py-4">Editar Colaborador</h1>
        <form action="/colaboradores/{{$data->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">CPF:</label>
                <input type="text" class="form-control" name="CPF" id="CPF" value="{{$data->CPF}}" required/>
                <label for="titulo">Nome:</label>
                <input type="text" class="form-control" name="Nome" id="Nome" value="{{$data->Nome}}" required/>
                <label for="descricao">Endereço:</label>
                <input type="text" class="form-control" name="Endereco" id="Endereco" value="{{$data->Endereco}}" required>
                <label for="imagem">Telefone:</label>
                <input type="text" class="form-control" name="Telefone" id="Telefone" value="{{$data->Telefone}}" required>
                <label for="titulo">Nascimento:</label>
                <input type="date" class="form-control" name="Nascimento" id="Nascimento" value="{{$data->Nascimento}}" required/>
                <label for="titulo">E-mail:</label>
                <input type="email" class="form-control" name="Email" id="Email" value="{{$data->Email}}" required/>
                <label for="titulo">Disponibilidade:</label>
                <input type="text" class="form-control" name="Disponibilidade" id="Disponibilidade" value="{{$data->Disponibilidade}}" required/>
                <label for="titulo">Religião:</label>
                <input type="text" class="form-control" name="Religiao" id="Religiao" value="{{$data->Religiao}}" required/>
                <label for="titulo">Afinidade:</label>
                <input type="text" class="form-control" name="Afinidade" id="Afinidade" value="{{$data->Afinidade}}" required/>
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </form>
    </div>
@endsection
@section('script')
<script type="module">
    $().ready(function() {
        let numberMask = new Inputmask('+99(99)99999-9999')
        numberMask.mask('#Telefone')
        let cpfMask = new Inputmask('999.999.999-99')
        cpfMask.mask('#CPF')
    });
</script>
@endsection