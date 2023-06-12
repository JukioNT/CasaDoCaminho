@extends('site.layout')
@section('title', 'Noticias')
@section('body')
    <div class="album py-5">
        <div class="container">
            <h1>Noticias</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($noticia as $item => $value)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/{{$value->imagem}}">
                        </div>
                        <div class="card-body">
                            <h3 class="py-3">{{$value['titulo']}}</h3>
                            <p class="card-text">{{$value['descricao']}}</p>
                            @if(Auth::check())
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/noticias/editar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                    <a onclick="return confirm('Tem certeza que deseja deletar?')" href="/noticias/deletar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary" >Deletar</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <h1>Eventos</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($evento as $item => $value)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/{{$value->imagem}}">
                        </div>
                        <div class="card-body">
                            <h3 class="py-3">{{$value['titulo']}}</h3>
                            <p class="card-text">{{$value['descricao']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                @if(Auth::check())
                                <div class="btn-group">
                                    <a href="/eventos/editar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                    <a onclick="return confirm('Tem certeza que deseja deletar?')" href="/eventos/deletar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary" >Deletar</a>
                                    
                                </div>
                                @endif
                                <small>Data do evento: {{date('d/m/Y H:i', strtotime($value['dataEvento']))}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="scroll-container">
                @foreach ($noticia as $item => $value)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/{{$value->imagem}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
