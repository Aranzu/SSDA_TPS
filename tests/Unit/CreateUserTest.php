<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\RegisterController;



use Illuminate\Support\Facades\DB;


class CreateUserTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;

    function test_creacion_usuario_correcto(){

    //se crea un usuario admin quien creara al nuevo usuario funcionario    
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ])->assignRole('Admin');//se le asigna rol de admin

        //se registra al usuario usando el usuario creado
        $this->actingAs($user)->post('/register',[
            'name'      =>'Jose Rojas',
            'rut'       =>'45646455',
            'username'  =>'Jose234',
            'email'     =>'manuel34345@gmail.com',
            'cargo'     =>'RRHH',
            'password'  =>'password',
            'password_confirmation'=>'password',
            'opciones'=>'Funcionario',
        ]);
        //se revisa en la base de datos si efectivamente se creo el usuario antes creado
        $this->assertDatabaseHas('users',[
            'name'      =>'Jose Rojas',
            'rut'       =>'45646455',
            'username'  =>'Jose234',
            'email'     =>'manuel34345@gmail.com',
            'cargo'     =>'RRHH',
        ]);
    }

}
