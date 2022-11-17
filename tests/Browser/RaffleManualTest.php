<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RaffleManualTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_manual_raffle()
    {   
        //Para esta prueba se requiere crear el usuario admin. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'Admin')
                    ->type('password', '12345678')
                    ->press('Acceder')
                    ->visit('/raffle_manual')
                    //->attach('Lista_Trabajadores_Test', storage_path('storage/app/public/Lista_Trabajadores_Test.xlsx'))
                    ->attach('texto_sorteados', __DIR__.'/files/Lista_Trabajadores_Test.xlsx')
                    ->press('Realizar Sorteo')
                    ->press('Guardar y Enviar Sorteo')
                    ->press('Enviar')
                    ->assertSee('OK');
        });
    }
}
