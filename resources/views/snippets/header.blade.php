<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img class="logo" src="https://portalweb.tps.cl/tps_online/assets/images/tpshome/logo-tps-header.svg" alt="" style="float: right; width: 100px; height: 40px; margin-top: 10px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span role="button" ><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-0 mb-md-0 justify-content-center text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Inicio</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Operaciones</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">Preguntas Frecuentes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name ?? auth()->user()->username ?? "Cuenta"}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @guest
                            <li><a class="dropdown-item" href="/login">Iniciar sesión</a></li>
                            @endguest
                            @auth
                            <li><a class="dropdown-item blue_tps" href="/logout">Cerrar sesión</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
