@extends('site.layout')
@section('title', 'Casa Do Caminho')
@section('body')
    @if (count($noticia) === 0)
    @else
        <div class="album py-3">
            <div class="container" style="width: 50%">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    @if (count($noticia) != 1)
                        <div class="carousel-indicators">
                            @foreach ($noticia as $index => $item)
                                <button type="button" data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide-to="{{ $index }}"
                                    @if ($index == 0) class="active noticia-button" aria-current="true" @else class="noticia-button" @endif
                                    aria-label={{ 'Slide' . ($index + 1) }}></button>
                            @endforeach
                        </div>
                    @endif
                    <div class="carousel-inner">
                        @foreach ($noticia as $item => $value)
                            <div data-bs-interval="10"
                                @if ($item == 0) class="carousel-item active" @else class="carousel-item" @endif>
                                <img src="/storage/{{ $value->imagem }}" alt="" class="d-block w-100 noticia-img">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $value['titulo'] }}</h5>
                                    <p>{{ $value['descricao'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (count($noticia) != 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon noticia-left-arrow" aria-hidden="true" ></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon noticia-right-arrow" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if (count($evento) === 0)
        
    @else
        <div class="eventos">
            @foreach ($evento as $item => $value)
            <div class="evento-container">
                <img src="/storage/{{ $value->imagem }}" class="evento-img">
                <p class="evento-title">{{ $value['titulo'] }}</p>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="colaborador-button" id="{{ $value->id }}" onclick="getId(this)">Seja um colaborador</button>
            </div>
            @endforeach
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ser um colaborador</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/colaboradores/registrar">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="cpf">Digite seu CPF:</label>
                            <input id="cpf" name="cpf" type="text">
                            <input type="hidden" id="idcpf" name="idcpf" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    @endif

    <div class="sobrenos" id="sobrenos">
        <h1>Sobre Nós</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil excepturi corrupti molestiae perspiciatis error nemo quod sint quasi! Laudantium itaque laboriosam aut aperiam et saepe tempore suscipit maxime sunt hic, in ad molestiae, quibusdam, odit eius qui quidem nemo perferendis distinctio quos ipsam! Unde, quidem dolorem. Dolores officiis architecto sit nisi temporibus at corrupti, ut, vero qui consequatur, maiores beatae quasi ipsam omnis. Sequi, culpa quaerat assumenda soluta explicabo commodi blanditiis. Unde maiores voluptatem tenetur debitis! Saepe sit velit asperiores blanditiis sint, consectetur molestiae maiores reprehenderit mollitia obcaecati eius corporis soluta facere cupiditate in quasi? Dolore maiores hic eveniet! Velit!</p>
    </div>
    <div class="footer">

    </div>
@endsection
@section('script')
<script type="module">
    $().ready(function() {
    let numberMask = new Inputmask('999.999.999-99')
    numberMask.mask('#cpf')
    });
</script>
<script>
    function getId(button){
        const id = button.id
        const input = document.getElementById('idcpf')
        console.log(input)
        input.value = id
    }
</script>
@endsection
