@extends('index.index_sidebar')
@section('content_home')
    <section class="vh-75" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 blue_tps"><i class="fa-solid fa-user-group me-2"></i>Usuarios del Sistema</p>
                                    <div class="table-responsive">
                                        <table table class="table table-bordered">
                                            <thead class="text-center blue_tps_bg text-white">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Usuario</th>
                                                    <th>Email</th>
                                                    <th>Cargo</th>
                                                    <th>Perfil</th>
                                                    <th>Contraseña</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user -> name}}</td>
                                                    <td>{{$user -> rut}}</td>
                                                    <td>{{$user -> username}}</td>
                                                    <td>{{$user -> email}}</td>
                                                    <td>{{$user -> cargo}}</td>
                                                    <td class="text-center"><a class="blue_tps" href="{{route('updateUserView', $user->id)}}"><i class="fa-solid fa-user-pen big_icons"></i></a></td>
                                                    <td class="text-center"><a class="blue_tps" href="{{route('updatePasswordUserView', $user->id)}}"><i class="fa-solid fa-pen-to-square big_icons"></i></a></td>
                                                    <td class="text-center">
                                                        <form class="mx-1 mx-md-4" action="{{route('deleteUser', $user->id)}}" method="POST">
                                                            @csrf
                                                            <div class="form-outline flex-fill mb-0">
                                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                                    <a class="blue_tps delete_users" href="#"><i class="fa-solid fa-square-xmark big_icons"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{$users -> links()}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

