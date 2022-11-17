@extends('index.index_master')
@section('content')
<div class="pt-5 vh-100" id="reset_password_parameters">
    <div id="reset_password_card"class="card text-center mx-auto box-shadow rounded">
        <div class="card-header h5 text-white blue_tps_bg">Restablecer la Contraseña:</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Para completar el proceso de restablecimiento de su contraseña, por favor a continuación debe ingresar su correo electrónico actual y nueva contraseña.
            </p>
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group row pb-2">
                    <label for="email_address" class="col-form-label text-left"><i class="fas fa-envelope fa-lg me-1 fa-fw"></i>Correo electrónico Actual:</label>
                    <div class="col">
                        <input type="text" id="email_address" class="form-control my-2 text-center" name="email" placeholder="correo@ejemplo.com"  required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="password" class="col-form-label"><i class="fas fa-solid fa-lock fa-lg me-1 fa-fw"></i>Nueva Contraseña:</label>
                    <div class="col">

                        <input type="password" id="password" class="form-control text-center" name="password" required autofocus>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="password-confirm" class="col-form-label text-left"><i class="fas fa-solid fa-lock fa-lg me-1 fa-fw"></i>Confirmar Nueva Contraseña:</label>
                        <input type="password" id="password-confirm" class="form-control my-2 text-center" name="password_confirmation" required autofocus>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
                <div class="pt-5">
                    <button type="submit" class="btn btn-primary w-75">Cambiar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
