@extends('index.index_sidebar')
@section('content_home')

<h1 class="text-center blue_tps pb-4"><i class="fa-solid fa-chart-pie me-2 big_icons"></i>Estadísticas</h1>
@if (isset($notes))
<div class="container">
    <h2 class="blue_tps font_25">Cantidad de veces que el funcionario ha sido sorteado:</h2>
    <div class="table-responsive">
        <table id="stats_table" class="table table-bordered">
            <thead class="text-center blue_tps_bg text-white">
                <tr>
                <th>N°</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Cantidad</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $contador = 1;
                @endphp
                @foreach ( $notes as $row )
                    <tr>
                        <td>{{$contador}}</td>
                        @php
                            $contador+=1;
                        @endphp
                        <td>{{$row["RUT"]}}</td>
                        <td>{{$row["NAME"]}}</td>
                        <td>{{$row["CARGO"]}}</td>
                        <td>{{$row["VALOR"]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif

@if (isset($notes2))
<div class="table-responsive">
    <table id="stats_table" class="table table-bordered" style="max-height:600px">
        <thead>
            <tr>
               <th></th>
               <th>Nombre</th>
               <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 1;
            @endphp
            @foreach ( $notes2 as $row )
                <tr>
                    <td>{{$contador}}</td>
                    @php
                        $contador+=1;
                    @endphp
                    <td>{{$row->nombre}}</td>
                    <td>{{$row->cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif


@endsection
