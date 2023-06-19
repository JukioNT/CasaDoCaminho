@extends('site.layout')
@section('title', 'Noticias')
@section('body')
    <div class="album py-5">
        <div class="container" style="width: 50%">
            <h1>Noticias</h1>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    @foreach ($noticia as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}"
                            @if ($index == 0) class="active" aria-current="true" @endif
                            aria-label={{ 'Slide' . ($index + 1) }}></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($noticia as $item => $value)
                        <div data-bs-interval="10" @if ($item == 0) class="carousel-item active" @else class="carousel-item" @endif>
                            <img src="/storage/{{ $value->imagem }}" alt="" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $value['titulo'] }}</h5>
                                <p>{{ $value['descricao'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
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
            </div>
        </div>
        <div class="container">
            <h1>Eventos</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($evento as $item => $value)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="/storage/{{ $value->imagem }}">
                        </div>
                        <div class="card-body">
                            <h3 class="py-3">{{ $value['titulo'] }}</h3>
                            <p class="card-text">{{ $value['descricao'] }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                @if (Auth::check())
                                    <div class="btn-group">
                                        <a href="/eventos/editar/{{ $value['id'] }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">Editar</a>
                                        <a onclick="return confirm('Tem certeza que deseja deletar?')"
                                            href="/eventos/deletar/{{ $value['id'] }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">Deletar</a>

                                    </div>
                                @endif
                                <small>Data do evento: {{ date('d/m/Y H:i', strtotime($value['dataEvento'])) }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
