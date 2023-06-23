@extends('site.layout')
@section('title', 'Noticias')
@section('body')
    @if (count($noticia) === 0)

    @else
        <div class="album py-3">
            <div class="container" style="width: 50%">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="false">
                    @if (count($noticia) != 1)
                        <div class="carousel-indicators">
                            @foreach ($noticia as $index => $item)
                                <button type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide-to="{{ $index }}"
                                    @if ($index == 0) class="active" aria-current="true" @endif
                                    aria-label={{ 'Slide' . ($index + 1) }}></button>
                            @endforeach
                        </div>
                    @endif
                    <div class="carousel-inner">
                        @foreach ($noticia as $item => $value)
                            <div data-bs-interval="10"
                                @if ($item == 0) class="carousel-item active" @else class="carousel-item" @endif>
                                <img src="/storage/{{ $value->imagem }}" alt="" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $value['titulo'] }}</h5>
                                    <p>{{ $value['descricao'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (count($noticia) != 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
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
        @foreach ($evento as $item => $value)
            <div class="container">
                <img src="/storage/{{ $value->imagem }}" class="evento-img">
                <p class="evento-titulo">teste</p>
            </div>
        @endforeach
    @endif
@endsection
