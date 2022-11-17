@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    <h1 class="text-center blue_tps"><i class="fa-solid fa-calendar-days me-2 big_icons"></i>Historial de Sorteos</h1>
    <div class="pt-3">
        <div class="container">
            <form action="/historial" method ="GET">
                @csrf
                <div class="container">
                    <div class="row">
                        <label for="date" class="col-form-label col-sm-2">Desde:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm set_date" id="fromDate" name="fromDate"
                            value="@php
                                if (isset($fromDate)) {
                                        echo $fromDate;
                                    }
                                elseif(isset($currentDate)){
                                    echo $currentDate;
                                }
                                @endphp" required/>
                        </div>
                        <label for="date" class="col-form-label col-sm-2">Hasta:</label>
                        <div class="col-sm-3 pb-5">
                           <input type="date" class="form-control input-sm set_date" id="toDate" name="toDate"
                           value="@php
                                if (isset($toDate)) {
                                    echo $toDate;
                                }
                                elseif(isset($currentDate)){
                                    echo $currentDate;
                                }
                                @endphp" required/>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" name="search" title="Search">Buscar Sorteos</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>
            @if(isset($query)&& count($query)>0)
                <table id="datosTrabajador" class="table table-striped table-bordered">
                    <thead class="text-center blue_tps_bg text-white">
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Detalle de Sorteo</th>
                            <th>Descargar Excel</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($query as $value)
                        <tr>
                            <td class="id">{{$value->id}}</td>
                            @php
                                $date_only=date("d-m-Y",strtotime($value->created_at));
                                $time_only=date("H:i:s A",strtotime($value->created_at));
                            @endphp
                            <td class="created_at">{{$date_only}}</td>
                            <td>{{$time_only}}</td>
                            <td><a class="blue_tps" href="{{route('historialdetalle', $value->id)}}"><i class="fa-solid fa-circle-info big_icons"></i></a></td>
                            <td><a class="blue_tps" href="{{route('export', $value->id)}}"><i class="fa-solid fa-circle-arrow-down big_icons"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
