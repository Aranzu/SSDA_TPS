@extends('index.index_master')
@section('content')
<!--Formulario de Login para la página.-->
    <div id="login_parameters" class="background_main_image height_class" style="background-image: url('{{ asset('img/background_pic.jpg')}}');">
        <br>
        <div class="container w-75 mt-5">
            <div class="row align-items-stretch">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                </div>
                <div class="col bg-white p-5 rounded-4">

                    <div class="text-center">
                        <img src="../Img/tps_web2021.png" alt="">
                    </div>
                    <h2 class="fw-bold text-center py-5 blue_tps">Iniciar sesión</h2>
                    <!--Login-->
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label blue_tps">Nombre de usuario:</label>
                            <input type="text" class="form-control"name="username" id="">
                            <div class="alert-danger text-center rojo_alert">{{$errors -> first('username')}}</div>
                        </div>
                        <div class="mb-4"></div>
                            <label for="password" class="form-label blue_tps">Contraseña:</label>
                            <input type="password" class="form-control"name="password" id="">
                            <div class="alert-danger text-center rojo_alert">{{$errors -> first('password')}}</div>
                        <br>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary blue_tps_bg">Acceder</button>
                        </div>
                        <div class="alert-danger text-center rojo_alert">{{$errors -> first('error_login')}}</div>
                        <div class="my-3 text-center">
                            <span><i class="fa-solid fa-lock" style="color:#144578"></i><a href="{{ route('forget.password.get') }}" class="blue_tps show_underline">¿Olvidaste tu contraseña?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection
