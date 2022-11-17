<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Providers\RouteServiceProvider;
use Database\Factories\UserFactory;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\RegisterController;

class ListUserTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;
    /**
     *
     * @test
     */
    

    function test_users_list()
    {
        $user = User::create([
            'name'      =>'Jose Rojas',
            'rut'       =>'5453533',
            'username'  =>'man33344',
            'email'     =>'manuel34345@example.com',
            'cargo'     =>'RRHH',
            'password'  =>'password',           
        ])->assignRole('Admin');

        $response = $this->actingAs($user)->get(action([ManageUserController::class, 'showUsers']));
        $response->assertSee('5453533');
    }
}
