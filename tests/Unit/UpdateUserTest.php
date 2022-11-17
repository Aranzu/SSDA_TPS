<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Database\Factories\UserFactory;
use App\Mail\ConfirmedYourEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class UpdateUserTest extends TestCase
{
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;

    public function test_update_user()
    {
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',
        ])->assignRole('Admin');

        $this->actingAs($user)->post("/updateUser/{$user->id}",[
            'name'      =>'Rodrigo Diaz',
            'username'  =>'Rdiaz2342',
            'email'     =>'rdiaz@example.com',
            'cargo'     =>'RRHH',
        ]);

        $this->assertDatabaseHas('users', [
            'name'      =>'Rodrigo Diaz',
            'username'  =>'Rdiaz2342',
            'email'     =>'rdiaz@example.com',
            'cargo'     =>'RRHH',
        ]);

    }
}
