<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RaffleEmailTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_send_email()
        //Para esta prueba se requiere crear el usuario admin. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
        //necesariamente hay que revisar la casilla de correo del destinatario para revisar si le llego el correo
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username', 'Admin')
                    ->type('password', '12345678')
                    ->press('Acceder')
                    ->visit('/raffle_auto')
                    ->press('Realizar Sorteo')
                    ->press('Guardar y Enviar Sorteo')
                    ->press('Enviar')
                    ->assertSee('OK');
        });
    }
}
