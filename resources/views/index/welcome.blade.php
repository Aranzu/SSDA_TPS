@extends('index.index_master')
@section('content')
    <main class="mb-3" style="background-color: #eee;">
        <div class="container mt-3 pt-3">

            <!--Section: Content-->
            <div class="container p-3 my-3 mt-3" style="background-color:none;">
                <h1 class="text-center blue_tps font-weight-bold mb-3">Bienvenido al Sistema de Sorteo de Test de Drogas y Alcohol.</h1>
                @guest
                <p class="text-center blue_tps"><a href="/login" class="font-weight-bold blue_tps show_underline">¿Deseas Iniciar Sesión?</a></p>
                @endguest
            </div>
            <div class="container-lg my-3">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner rounded shadow">
                        <div class="carousel-item active">
                            <img src="{{asset('img/carousel1.jpg')}}" class="d-block w-100" alt="Slide 1">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="font_14">Pasión es la energía que nos anima a hacer lo que hacemos con alegría y creatividad.</p>
                              </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/carousel2.jpg')}}" class="d-block w-100" alt="Slide 2">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="font_14">Excelencia es buscar constantemente mejorar todo lo que hacemos.</p>
                              </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/carousel2.jpg')}}" class="d-block w-100" alt="Slide 3">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="font_14">Proteger la vida y el medio ambiente en todas las acciones que realizamos ha de ser siempre una preocupación prioritaria.</p>
                              </div>
                        </div>
                    </div>

                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <!--Section: Content-->
            <hr class="my-5" />
            <section>
                <div class="row">
                    <div class="col-md-6 gx-5 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                            <img src="{{asset('img/background_v2.jpg')}}" class="img-fluid rounded shadow" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 gx-5 mb-4">
                        <h4 class="mb-3 blue_tps"><strong>¿Quiénes Somos?</strong></h4>
                        <p class="text-muted" align="justify">
                            Iniciamos nuestras actividades en el año 2000 como un terminal diseñado para recibir naves portacontenedores y multipropósito. Al poco tiempo de la puesta en marcha, adquirimos y operamos dos grúas pórtico del tipo Panamax.<br>
                            Sólo cuatro años más tarde obtuvimos la certificación ISPS, estándar internacional para la protección de las embarcaciones e instalaciones portuarias. Fuimos el primer puerto latinoamericano en cumplir con las condiciones exigidas para esta certificación.
                        </p>
                        <p><strong class="mb-5 blue_tps">¿Por qué TPS?</strong></p>
                        <p class="text-muted" align="justify">
                            Somos un terminal portuario que ofrece servicios de alta eficiencia: estamos preparados para movilizar un gran volumen de carga en espacio limitado, operando con moderno equipamiento y tecnología de nivel mundial.
                        </p>
                    </div>
                </div>
            </section>
            <hr class="my-5" />
            <!--Section: Content-->
            <section class="text-center mt-5">
                <h4 class="mb-5 blue_tps"><strong>Noticias</strong></h4>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('img/TPSV_nuevasgruas_grande.jpg')}}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                        </div>
                        <div class="card-body">
                        <p class="card-text" align="justify">
                            Se trata de dos máquinas de tipo Reachstaker que se integraron al equipamiento del concesionario 1 de Valparaíso. Estas grúas están plenamente operativas...
                        </p>
                        <a href="https://www.tps.cl/tps/noticias/2022/jul-ago-sept/tps-adquiere-nuevas-gruas-portacontenedores-que-reforzaran-sus-operaciones" class="btn btn-primary">Ver más...</a>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('img/TPSV_nuevoservicio_grande.jpg')}}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                        </div>
                        <div class="card-body">
                        <p class="card-text" align="justify">
                            Con la recalada de la nave YM Enlightenment se dio inicio oficial al nuevo servicio WS6 en Terminal Pacífico Sur Valparaíso (TPS), que unirá Valparaíso con Asia en forma directa...
                        </p>
                        <a href="https://www.tps.cl/tps/noticias/2022/jul-ago-sept/nuevo-servicio-en-tps-reafirma-confianza-en-el-sistema-portuario-de" class="btn btn-primary">Ver más...</a>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('img/TPSV_mediamaraton_grande.jpg')}}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                        </div>
                        <div class="card-body">
                        <p class="card-text" align="justify">
                            Una gran fiesta familiar que congregó a miles de personas en torno al deporte y la vida sana fue la décimo tercera versión de la Media Maratón TPS 2022, uno de los eventos...
                        </p>
                        <a href="https://www.tps.cl/tps/noticias/2022/jul-ago-sept/media-maraton-tps-reunio-mas-de-4-000-personas-en-valparaiso" class="btn btn-primary">Ver más...</a>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <!--Section: Content-->
            <hr class="my-5" />
        </div>
    </main>
@endsection
