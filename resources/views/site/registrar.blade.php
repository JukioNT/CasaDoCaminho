@extends('site.layout')
@section('title', 'Cadastrar Colaborador')
@section('body')
    
    <div class="card-body container">
        <h1 class="py-4">Adicionar novo Colaborador</h1>
        <form action="/registrar/salvar" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">CPF:</label>
                <input type="text" class="form-control" name="" placeholder="Disabled input" aria-label="Disabled input example" disabled value="{{$data['cpf']}}">
                <label for="titulo">Nome:</label>
                <input type="text" class="form-control" name="Nome" id="Nome"/>
                <label for="descricao">Endereço:</label>
                <input type="text" class="form-control" name="Endereco" id="Endereco">
                <label for="imagem">Telefone:</label>
                <input type="text" class="form-control" name="Telefone" id="Telefone">
                <label for="titulo">Nascimento:</label>
                <input type="date" class="form-control" name="Nascimento" id="Nascimento"/>
                <label for="titulo">E-mail:</label>
                <input type="email" class="form-control" name="Email" id="Email"/>
                <label for="titulo">Disponibilidade:</label>
                <input type="text" class="form-control" name="Disponibilidade" id="Disponibilidade"/>
                <label for="titulo">Religião:</label>
                <input type="text" class="form-control" name="Religiao" id="Religiao"/>
                <label for="titulo">Afinidade:</label>
                <input type="text" class="form-control" name="Afinidade" id="Afinidade"/>
                <input type="hidden"name="CPF" id="CPF" value="{{$data['cpf']}}">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
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