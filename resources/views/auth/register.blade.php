@extends('index.index_sidebar')
@section('content_home')
@can('admin.register')
    <section class="vh-75 mb-3 pt-3" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 blue_tps"><i class="fa-solid fa-user-plus me-2 big_icons"></i>Crear Usuarios</p>
                                    <form class="mx-1 mx-md-4" action="/register" method="POST">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="name" placeholder="Nombre Completo" />
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('name')}}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-address-card fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="rut" placeholder="Escribe Rut con guión" />
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('rut')}}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-circle-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="username" placeholder="Nombre de usuario"/>
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('username')}}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" class="form-control" name="email" placeholder="Email"/>
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('email')}}</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-user-tie fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="cargo" placeholder="Cargo"/>
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('cargo')}}</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña"/>
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('password')}}</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Repite la contraseña"/>
                                                <div class="alert-danger red_color font-weight-bold">{{$errors -> first('password_confirmation')}}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-user-gear fa-lg me-4 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select class="form-select form-select-sm mb-0 ps-2" name="opciones" aria-label=".form-select-lg">
                                                    <option selected>Establecer privilegios</option>
                                                    <option value="Admin">Administrador</option>
                                                    <option value="Funcionario">Funcionario</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-2 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary px-5" name="submit">Crear Usuario</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="{{ asset('img/testing.jpg')}}"class="img-fluid" alt="Sample image" style="border-radius: 25px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endcan
@endsection

