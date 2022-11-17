@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    @if (isset($id_sent))
        <h1 class="text-center blue_tps"><i class="fa-solid fa-circle-info me-2 big_icons"></i>Detalle de Sorteo N°{{$id_sent}}</h1>
    @endif
    <div class="pt-3">
        <div class="container">
            <form class="row mx-1 mx-md-4" method="GET">
                @csrf
                <div class="container pb-5">
                    <div class="table-responsive">
                        <table table class="table table-striped table-bordered nowrap">
                            <thead class="text-center blue_tps_bg text-white">
                                <tr>
                                    <th>Nº</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php
                                    $contador = 1;
                                @endphp
                                @foreach($query as $value)
                                <tr>
                                    <td>{{$contador}}</td>
                                        @php
                                            $contador+=1;
                                        @endphp
                                    <td>{{$value -> rut}}</td>
                                    <td>{{$value -> name}}</td>
                                    <td>{{$value -> cargo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
