<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login()
    {
        {
            $user = User::create([
                'name'      =>'Manuel Rojas',
                'rut'       =>'25615612',
                'username'  =>'manuel',
                'email'     =>'manuel@example.com',
                'password'  =>'password',
                'cargo'     =>'RRHH',
    
            ]);
            //$user = User::factory()->create();
    
            $response  = $this->post('/login', [
                "username" => $user->username,
                "password" =>"password"
            ]);

            $this->assertAuthenticatedAs($user);
            
    
            //$this->assertCredentials($credentials);
    
        }

    }

}
