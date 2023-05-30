@extends('site.layout')
@section('title', 'Noticias')
@section('body')
    <div class="album py-5">
        <div class="container">
            <h1>Noticias ADM</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($noticia as $item => $value)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                    y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="py-3">{{$value['titulo']}}</h3>
                            <p class="card-text">{{$value['descricao']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/noticias/editar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                    <a onclick="return confirm('Tem certeza que deseja deletar?')" href="/noticias/deletar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary" >Deletar</a>
                                </div>
                            </div>
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
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%"
                                    y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h3 class="py-3">{{$value['titulo']}}</h3>
                            <p class="card-text">{{$value['descricao']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/eventos/editar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary">Editar</a>
                                    <a onclick="return confirm('Tem certeza que deseja deletar?')" href="/eventos/deletar/{{$value['id']}}" type="button" class="btn btn-sm btn-outline-secondary" >Deletar</a>
                                    
                                </div>
                                <small>Data do evento: {{date('d/m/Y H:i:s', strtotime($value['dataEvento']))}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
