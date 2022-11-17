@extends('index.index_master')
@section('content')
    @auth
    <div class="container-fluid height_class">
        <div class="row flex-nowrap height_class">
            <div class="col-auto px-0 py-0 border-0" style="background-color: #144578;">
                <div id="sidebar" class="collapse collapse-horizontal show">
                    <div id="sidebar-nav" class="list-group border-0 rounded-none">
                        <div class="p-2 pb-4">
                            <a href="/home" class="text-decoration-none"><h4 class="text-white"><i class="fa-sharp fa-solid fa-house me-2"></i>Operaciones Disponibles</h4></a>
                        </div>
                        <ul class="list-group">
                            @can('admin.manage')
                                <div class="p-2">
                                    <h4 class="text-white"><i class="fa-solid fa-screwdriver-wrench big_icons me-2"></i><span class="font_20">Administración</span></h4>
                                </div>
                                <li class="list-group-item">
                                    <a href="/register" class="text-decoration-none blue_tps"><i class="fa-solid fa-user-plus me-2 big_icons"></i><span class="font_18">Crear Usuarios</span></a> </li>
                                <li class="list-group-item">
                                    <a href="/showUsers" class="text-decoration-none blue_tps"><i class="fa-solid fa-user-pen me-2 big_icons"></i><span class="font_18">Ver y Editar Usuarios</span></a> </li>
                                <li class="list-group-item">
                                    <a href="/stats" class="text-decoration-none blue_tps"><i class="fa-solid fa-chart-pie me-2 big_icons"></i><span class="font_18">Estadísticas</span></a> </li>
                                <li class="list-group-item">
                                    <a href="/manage_emails" class="text-decoration-none blue_tps"><i class="fa-solid fa-envelope-open-text me-2 big_icons"></i><span class="font_18">Agregar Destinatarios</span></a> </li>
                            @endcan
                            @can('operator.manage')
                                <div class="p-2">
                                    <h4 class="text-white"><i class="fa-sharp fa-solid fa-ticket me-2 big_icons"></i><span class="font_20">Gestionar Sorteos</span></h4>
                                </div>
                                <li class="list-group-item">
                                    <a href="/raffle_auto" class="text-decoration-none blue_tps"><i class="fa-solid fa-address-book me-2 big_icons"></i><span class="font_18">Sorteo Automatizado</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/raffle_manual" class="text-decoration-none blue_tps"><i class="fa-solid fa-address-book me-2 big_icons"></i><span class="font_18">Sorteo Manual</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/historial" class="text-decoration-none blue_tps"><i class="fa-solid fa-calendar-days me-2 big_icons"></i><span class="font_18">Historial de Sorteos</span></a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col ps-md-2 pt-2">
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none" style="font-size: 45px;  color:#144578;"><i class="bi bi-list"></i></a>
                <div class="pt-4 pb-5">
                    @yield('content_home')
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
