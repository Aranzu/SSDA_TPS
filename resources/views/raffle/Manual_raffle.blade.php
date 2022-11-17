@extends('index.index_sidebar')
@section('content_home')
<div class="card text-black pt-5 pb-5" style="border-radius: 32px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center blue_tps"><i class="fa-solid fa-address-book me-3"></i>Sorteo Manual</h1>
                <p class="text-center">
                Este es el Sorteo Manual de test de drogas y alcohol, para utilizar este módulo debes subir un archivo en formato excel, seleccionar un porcentaje de sorteo y presionar realizar sorteo.
                </p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center pb-3">
            <form class="range" action="/raffle_manual" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8  col-sm-8 form-group range__slider">
                        @php
                            $slider_value = 1;
                            if (isset($porcentaje_manual)) {
                                $slider_value = $porcentaje_manual;
                            }
                            echo '<input type="range" min="1" max="100" value="' . $slider_value . '" step="1" name="porcentaje_manual">';
                        @endphp
                    </div>
                    <div class="col-lg-4 col-sm-4 form-group range__value">
                        <label>Porcentaje de sorteo</label>
                        <span class="remclass2"></span>
                    </div>
                    <div class="col">
                        <p>Sube tu archivo excel aquí: </p>
                        <div class="file-upload-wrapper">
                            <input type="file" id="input-file-now" class="file-upload" name="texto_sorteados" accept=".xls,.xlsx"/>
                        </div>
                        <div class="pb-5">
                            <div class="alert-danger red_color">{{$errors -> first('texto_sorteados')}}</div>
                        </div>
                        <div class="text-center pb-3">
                            <input type="submit" class="btn btn-primary text-white btn-lg button-style" value="Realizar Sorteo">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (isset($resultados) && count($resultados)>0)
            <h2 class="blue_tps pb-2"><i class="fa-solid fa-clipboard-list me-3"></i>Listado del personal sorteado:</h2>
            <p>Este es el listado del personal que ha sido seleccionado.</p>
            <div class="pb-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center blue_tps_bg text-white">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Cargo</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $number=1;
                            @endphp
                            @foreach ($resultados as $row)
                                <tr>
                                    <td>{{$number}}</td>
                                    @php
                                        $number+=1;
                                    @endphp
                                    <td>{{$row[0]}}</td>
                                    <td>{{$row[1]}}</td>
                                    <td>{{$row[2]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <form class="form-inline" id="second_form" action="/send-email" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    @csrf
                    <div class="form-group col-md-12 pb-4">
                        <h3 class="blue_tps"><i class="fa-solid fa-envelopes-bulk me-3"></i></i>Seleccione Destinatarios:</h3>
                        <p>Puedes escoger el/los destinatario(s) de la siguiente lista.</p>
                        <div class="table-responsive">
                            <table id="tabla_destinatarios" class="table table-bordered">
                                <thead class="text-center blue_tps_bg text-white">
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkAll" />
                                            </div>
                                        </th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Correo Electrónico</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($recipients as $recipients)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="RecipientsArr[]" value="{{$recipients->email}}" id="flexCheckDefault"/>
                                                </div>
                                            </th>
                                            <td>{{$recipients->name}}</td>
                                            <td>{{$recipients->cargo}}</td>
                                            <td>{{$recipients->email}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group col-md-6 pb-4">
                        <h4 class="blue_tps"><i class="fa-solid fa-envelopes-bulk me-3"></i></i>Agregar Destinatarios adicionales:</h4>
                        <p>En caso de ser necesario, puedes ingresar destinatarios adicionales.<br>Los correos electrónicos se deben ingresar separados por un carácter coma (,).<br><br>Ejemplo: correo1@ejemplo.com,correo2@ejemplo.com.</p>
                        <input id="email-addresses" class="form-control" type="text" name="mail_form">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="submit" class="btn btn-primary text-white show_confirm send_save_employees" value="Guardar y Enviar Sorteo">
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
