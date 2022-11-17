@extends('index.index_master')
@section('content')
<div class="pt-5 vh-100" id="reset_password_parameters">
    <div id="reset_password_card"class="card text-center mx-auto box-shadow rounded">
        <div class="card-header h5 text-white blue_tps_bg">Restablecer la Contraseña:</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Ingrese su dirección de correo electrónico y le enviaremos un correo con instrucciones para restablecer su contraseña.
            </p>
            <div class="form-outline">
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group row mb-5">
                        <div class="col">
                            <input type="text" id="email_address" class="form-control my-3" name="email" placeholder="correo@ejemplo.com" required autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-5">Enviar restablecimiento de contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
