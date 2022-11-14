@extends('index.index_sidebar')
@section('content_home')
<div class="page-header pt-3">
    <div class="row">
        <div class="col-md-8">
            <h2 class="blue_tps">Bienvenido, {{auth()->user()->name ?? auth()->user()->username}}</h2>
        </div>
        <div class="col-md-4">
            @php
                $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                $date=$diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
            @endphp
            <h3 class="blue_tps">{{$date}}</h3>
        </div>
    </div>
</div>
<hr class="blue_tps">
<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title text-center">Total de sorteos realizados por el usuario:</h5>
                <p class="card-text  font_24 blue_tps text-center">
                    @php
                        $valor_sorteo=0;
                        if (isset($raffle_count)) {
                            $valor_sorteo=$raffle_count;
                        }
                    @endphp
                    <i class="fa-regular fa-address-book me-2"></i>{{$valor_sorteo}}
                </p>
                <!--<a href="#" class="btn btn-primary">ver tabla</a>-->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title text-center">Último sorteo realizado por el usuario:</h5>
                <p class="card-text  font_24 blue_tps text-center">
                    @php
                        $valor_time = "No hay fecha de sorteo";
                        if (isset($time_raf)) {
                            $valor_time=$time_raf;
                        }
                    @endphp
                    <i class="fa-regular fa-clock me-2"></i>{{$valor_time}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title text-center">Cargo actual del Usuario:</h5>
                <p class="card-text font_24 blue_tps text-center">
                    @php
                        $valor_pos = "No hay cargo asociado";
                        if (isset($position)) {
                            $valor_pos=$position;
                        }
                    @endphp
                    <i class="fa-regular fa-address-card me-2"></i>{{$valor_pos}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
