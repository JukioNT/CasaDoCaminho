@extends('site.layout')
@section('title', 'Casa Do Caminho')
@section('body')
    @if (count($noticia) === 0)
    @else   
        <div class="album py-3">
            <div class="container carousel-container">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    @if (count($noticia) != 1)
                        <div class="carousel-indicators">
                            @foreach ($noticia as $index => $item)
                                <button type="button" data-bs-target="#carouselExampleAutoplaying"
                                    data-bs-slide-to="{{ $index }}"
                                    @if ($index == 0) class="active noticia-button" aria-current="true" @else class="noticia-button" @endif
                                    aria-label="{{ 'Slide ' . ($index + 1) }}"></button>
                            @endforeach
                        </div>
                    @endif
                    <div class="carousel-inner">
                        @foreach ($noticia as $index => $value)
                            <div data-bs-interval="5000"
                                @if ($index == 0) class="carousel-item active" @else class="carousel-item" @endif>
                                <img src="{{ $value->imagem }}" alt="" class="d-block w-100 noticia-img">
                                <div class="carousel-gradient"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $value['titulo'] }}</h5>
                                    <p>{{ $value['descricao'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (count($noticia) != 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif
    
    @if (count($evento) === 0)
        
    @else
        <div class="album py-5">
            <div class="container">
                <div class="row">
                    @foreach ($evento as $item => $value)
                        <div class="col-md-4">
                            <div class="evento-container col">
                                <img src="/storage/{{ $value->imagem }}" class="evento-img">
                                <p class="evento-title">{{ $value['titulo'] }}</p>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="colaborador-button" id="{{ $value->id }}" onclick="getId(this)">Seja um colaborador</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection
@section('script')
<script type="module">
    $().ready(function() {
    let numberMask = new Inputmask('999.999.999-99')
    numberMask.mask('#cpf')
    });
</script>
<script>

    let isComplete = false;

    function getId(button){
        const id = button.id
        const input = document.getElementById('idprojeto')
        input.value = id
        BlockButton(button, false)
    }

    function removerFormatacaoCPF(cpfFormatado) {
        const cpfSemFormatacao = cpfFormatado.replace(/\./g, '').replace(/-/g, '');
        return cpfSemFormatacao;
    }

    function verificaCPF(input){
        const invalidFeedback = input.nextElementSibling;
        const enviarButton = document.getElementById('enviarButton');
        const cpfNumerico = input.value.replace(/\D/g, '');

        if(cpfNumerico.length == 11){
            isComplete = true
        }            
    
        if(isComplete){
            if (TestaCPF(input.value)) {
                input.classList.remove('is-invalid');
                invalidFeedback.style.display = 'none';
                BlockButton(enviarButton, true);
            }else{
                input.classList.add('is-invalid');
                invalidFeedback.style.display = 'block';
                BlockButton(enviarButton, false);
            }
        }
    }

    function BlockButton(button, value){
        if(value){
            enviarButton.removeAttribute('disabled');
        }else{
            enviarButton.setAttribute('disabled', 'disabled');
        }
    }

    function TestaCPF(strCPF) {
        strCPF = removerFormatacaoCPF(strCPF);
        var Soma;
        var Resto;
        Soma = 0;

        if(strCPF.length < 11) return false

        if (strCPF == "00000000000") return false;

        for (var i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (var i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }


</script>
@endsection
