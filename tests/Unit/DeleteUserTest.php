<?php

namespace Tests\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;
use Tests\TestCase;

use Illuminate\Support\Facades\DB;



class DeleteUserTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;

    public function test_user_delete()
    {
    //para esta prueba requiere los roles, primero ejecutar: php artisan migrate:fresh --seed
    //se crean 2 usuarios, uno admin y otro funcionario. el primero eliminará al segundo    
        $user = User::create([
            'id'        =>'2',
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ])->assignRole('Admin');//se le asigna rol de admin

        $user2 = User::create([
            'id'        =>'3',
            'name'      =>'Fabian Rojas',
            'rut'       =>'456464',
            'username'  =>'fabi11123',
            'email'     =>'fabi11123@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ])->assignRole('Funcionario');

        $this->actingAs($user)->post("/deleteUser/{$user2->id}")
             ->assertRedirect('/showUsers');

        $this->assertDatabaseMissing('users', ['id' => $user2->id]);


    }
}



