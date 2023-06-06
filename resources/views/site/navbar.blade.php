<nav class="navbar navbar-expand-md">
    <div class="logo">
        <div class="logo-text">
            <a href="/" style="text-decoration: none; color: inherit;"><h2 class="py-1">Casa Do Caminho</h2></a>
        </div>
    </div>
    <div class="navbar-items">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">ADM</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/noticias/lista">Noticias</a>
                        <a class="dropdown-item" href="/eventos/lista">Eventos</a>
                        <a class="dropdown-item" href="/colaboradores/lista" >Colaboradores</a>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/sobrenos" aria-expanded="false">Sobre nós</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Doações</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Formas de ajudar</a>
                        <a class="dropdown-item" href="#">O que precisa?</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://example.com" aria-haspopup="true" aria-expanded="false">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</nav>
