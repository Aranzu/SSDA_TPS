<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\DB;

class HistorialTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;
    /**
     *
     * @test
     */

    public function mostrar_trabajador_raffle(): void
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

        Raffle::create([
            'id' => '1',
            'rut' => '7651222',
            'name' => 'Colby Herzog',
            'cargo' => 'Veterinarian',
        ]);

        $listaRaffle = ListaRaffle::factory()->create();

        $raffleResult = 
            DB::table('raffle')
            ->select()
            ->join('lista_raffle', 'lista_raffle.raffle_id', '=','raffle.id')
            ->where('lista_raffle.lista_id', '=', 1)
            ->get();

        $response = $this->actingAs($user)->get(action([HistorialController::class, 'historialdetalle'], $listaRaffle->id));
        $this->assertEquals($raffleResult, $response['query']);
    }
}


