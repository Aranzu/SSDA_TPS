<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\RaffleController;
use App\Models\User;
use Session;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class RaffleTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed

    //use RefreshDatabase;
    /**
     *
     * @test
     */
    

    public function test_raffle_generateRaffle()
    {   //Se llama a la funcion, se le entrega el porcentaje de valor 1, deben retornar 2 seleccionados.
        $user = User::factory()->create()->assignRole('Admin');
        $response = $this->actingAs($user)->post(action([RaffleController::class, 'generateRaffle'],['percentage'=>'1']));
        //se cuentan cuantos "arrays" trae de vuelta. (cada uno tiene un trabajador seleccionado)
        $resultEsperado = 2;
        $contarArrays = count($response['resultados']);
        //$this->assertEquals(3, $contarEleArray);
        $this->assertEquals($resultEsperado, $contarArrays);
        
        //dd($contarEleArray);
        //dd($contarArrays);
    }

    public function test_aleatoriedad_generateRaffle()
    {   //Se llama a la funcion 2 veces, se selecciona el 1%, los resultados por probabilidad deben ser diferentes.
        $user = User::factory()->create()->assignRole('Admin');
        $response = $this->actingAs($user)->post(action([RaffleController::class, 'generateRaffle'],['percentage'=>'1']));
        $response2 = $this->actingAs($user)->post(action([RaffleController::class, 'generateRaffle'],['percentage'=>'1']));
        $resul1=array($response['resultados']);
        $resul2=array($response2['resultados']);

        $this->assertNotEquals($resul1, $resul2);
        
        //Si preguntamos si son iguales la prueba fallará:
        //$this->assertEquals($resul1, $resul2);
    }

    public function test_save_generateRaffle()
    {   
        //se crea un arreglo con 1 sorteado
        $sorteado = array([0 => 92547866,
                        1 => "Joelle Marshall",
                        2 => "Surgeon"]);
        //se pone en la lista_sorteado que pide la funcion guardar y se guarda el array antes creado
        Session::put('Lista_sorteados', $sorteado);
        //se crea usuario mediante factories
        $user = User::factory()->create()->assignRole('Admin');
        //se llama a la funcion SaveRaffle usando el usuario antes creado y con una Session que tiene Lista_sorteados (ambos son requerimientos para guardar)
        $response = $this->actingAs($user)->get(action([RaffleController::class, 'SaveRaffle']));
        //se comprueba en la base de datos si existe el usuario sorteado
        $this->assertDatabaseHas('raffle', [
            'rut' => '92547866',
        ]);
    }
}
