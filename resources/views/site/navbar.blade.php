<nav class="navbar navbar-expand-md">
    <div class="container">
        <div class="logo">
            <div class="logo-text">
                <a class="navbar-brand" href="/"><h2 class="py-2">Casa Do Caminho</h2></a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-items" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">ADM</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/noticias/lista">Noticias</a>
                        <a class="dropdown-item" href="/eventos/lista">Eventos</a>
                        <a class="dropdown-item" href="/colaboradores/lista" >Colaboradores</a>
                        <a class="dropdown-item" href="/tipodoacoes/lista" >Produtos p/ Doação</a>
                        <a class="dropdown-item" href="/doacoes/lista" >Doações</a>
                        <a class="dropdown-item" href="/familias/lista" >Familias</a>
                        <a class="dropdown-item" href="/filhos/lista" >Filhos</a>
                    </div>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Doações</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Formas de ajudar</a>
                        <a class="dropdown-item" href="#">O que precisa?</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" href="#sobrenos" aria-haspopup="true" aria-expanded="false">Sobre Nós</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
