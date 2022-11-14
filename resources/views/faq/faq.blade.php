@extends('index.index_master')
@section('content')
    <section class="vh-80" style="background-color: #eee;">
        <div class="container h-100 pt-5 pb-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <section>
                                    <h3 class="text-center mb-4 pb-2 blue_tps fw-bold">Preguntas Frecuentes</h3>
                                    <p class="text-center mb-5">
                                    Encuentra respuesta a las preguntas más frecuentes para el uso de la plataforma
                                    </p>

                                    <div class="row">
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fa-solid fa-paper-plane"></i> Que es el sistema de sorteo de test de drogas y alcohol (SSDA)?</h6>
                                        <p>
                                        Este sistema te permite realizar los sorteos de test de drogas y alcohol en los trabajadores de TPS, exceptuando
                                        aquellos con permiso, licencia o vacaciones.
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fas fa-pen-alt blue_tps pe-2"></i> Cómo puedo acceder al sistema?</h6>
                                        <p>
                                        Debes solicitar tu registro al administrador, quien te conferirá acceso al sistema. Para el registro el adminsitrador o funcionario designado debe
                                        con tu Nombre, Rut, correo electronico y cargo. Tendras un nombre de usuario y contraseña que te seran conferidas por el administrador
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fas fa-user blue_tps pe-2"></i> Cómo puedo realizar el sorteo?
                                        </h6>
                                        <p>
                                        Una vez registrada tu cuenta podras ingresar con tus credenciales, seleccionar la opción "Sorteo Automático", luego elegir el porcentaje de selección a aplicar
                                         y finalmente presionar el boton "Realizar Sorteo". Una vez realizado, debes seleccionar los correos destinatarios de la lista de sorteados y presionar Guardar y Enviar.
                                    </p>
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fas fa-rocket blue_tps pe-2"></i> Qué pasa si el sorteo automático no funciona?
                                        </h6>
                                        <p>
                                        Puede realizar el sorteo de forma "manual". Para ello obtienes la información de los trabajadores de Buk, necesitas crear un excel
                                        con 3 columnas sin encabezado. En la primera columna ingresas los Rut de los trabajadores, en la segunda sus nombres y en la tercera sus cargos correspondientes. Luego Ingresasa
                                        a "Sorteo Manual", defines el porcentaje, cargas el archivo excel descrito anterioremente y presionar "Realizar Sorteo".
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fas fa-home blue_tps pe-2"></i> Cómo puedo ver los sorteos que ya he realizado?
                                        </h6>
                                        Debes seleccionar la opción "Historial", ahi podrás ingresar el rango de fecha correspondiente a los sorteos que quieres buscar.
                                        Luego al ver los resultados, puedes presionar ver detalle y observaras los resultados, los cuales puedes exportar en un documento.
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 blue_tps"><i class="fas fa-book-open blue_tps pe-2"></i> Como puedo obtener mayor información sobre el sistema?
                                        </h6>
                                        <p>
                                        Debes pedir al administrador o funcionario designado que te proporciones el manual de usuario, donde podras encontrar en detalle como funciona el sistema.
                                        </p>
                                    </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
