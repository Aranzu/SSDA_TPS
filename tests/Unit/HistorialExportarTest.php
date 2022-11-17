<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Http\Controllers\HistorialController;


class HistorialExportarTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;
    
    /**
     *
     * @test
     */

    public function exportar_raffle(): void
    {
        $user = User::create([
            'id'        =>'2',
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ])->assignRole('Admin');//se le asigna rol de admin
        
        Lista::factory()->create();

        Raffle::factory()->create();

        $listaRaffle = ListaRaffle::factory()->create();

        $this->actingAs($user)->get(action([HistorialController::class, 'export'], $listaRaffle->id))
             ->assertDownload();
    }
}
