@extends('site.layout')
@section('title', 'Cadastrar Colaborador')
@section('body')
    
    <div class="card-body container">
        <h1 class="py-4">Participar evento</h1>
        <form action="/registrar/participar" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">CPF:</label>
                <input type="text" class="form-control" name="" placeholder="Disabled input" aria-label="Disabled input example" disabled value="{{$data['cpf']}}" required>
                <label for="titulo">E-mail:</label>
                <input type="email" class="form-control" name="Email" id="Email" required/>
                <label for="titulo">Senha:</label>
                <input type="password" class="form-control" name="Senha" id="Senha" required/>
                <input type="hidden"name="CPF" id="CPF" value="{{$data['cpf']}}">
                <input type="hidden"name="id" id="id" value="{{$data['id']}}">
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