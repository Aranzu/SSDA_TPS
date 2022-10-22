@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    <h1 class="text-center blue_tps">Historial de Sorteo</h1>
    <div class="pt-3">
        <div class="container">
            <form action="{{route('historial')}}" method ="GET">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <label for="date" class="col-form-label col-sm-2">Desde:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                        </div>
                        <label for="date" class="col-form-label col-sm-2">Hasta:</label>
                        <div class="col-sm-3 pb-5">
                           <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" name="search" title="Search">Buscar Sorteos</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>
            @if(isset($query)&& count($query)>0)
                <table id="datosTrabajador" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="text-center">Detalle de Sorteo</th>
                            <th class="text-center">Exportar en Excel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($query as $value)
                        <tr>
                            <td class="id">{{$value->id}}</td>
                            @php
                                $date_only=date("d-m-Y",strtotime($value->created_at));
                                $time_only=date("H:i:s A",strtotime($value->created_at));
                            @endphp
                            <td class="created_at">{{$date_only}}</td>
                            <td>{{$time_only}}</td>
                            <td class="text-center"><a href="{{route('historialdetalle', $value->id)}}"><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></button></a></td>
                            <td class="text-center"><a href="{{route('export', $value->id)}}"><button class="btn btn-primary"><i class="fa-solid fa-file-arrow-down"></i></button></a></td>
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
