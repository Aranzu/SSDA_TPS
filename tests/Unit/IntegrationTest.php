<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class IntegrationTest extends TestCase
{
    /**
     *
     * @test
     */
    
    public function test_integration_vacaciones()
    {
        //$this->withoutExceptionHandling();
        //se ingresa el endpoint, se obtiene el body y se guarda en $data, se crea $trabajador con datos esperados, se formatea ambas variables y luego se compara
        $response = Http::get('http://44.201.209.77/api/vacaciones/92547928');
        $data = json_decode($response->getBody());
        $trabajador = array(
            "nombre" => "Khalani Mayo",
            "apellido"=> "Khalani Mayo",
            "segundoApellido" => "Khalani Mayo",
            "rut" => 92547928,
            "diasHabiles" => "5",
            "tipo" => "Progresivas",
            "inicio" => "2022-09-22",
            "termino" => "2022-09-27",
            "estado" => "Aprobada",
            "cargo" =>  "Construction worker",
            "division" => "Construction worker",
            "departamento" => "Construction worker",
            "area" => "Construction worker",
        );
        $expected_data = json_encode(array($trabajador));
        $real_data = json_encode(array($data));
        $this->assertEquals($expected_data, $real_data);        
    }

    public function test_integration_licencias()
    {
        //$this->withoutExceptionHandling();
        //se ingresa el endpoint, se obtiene el body y se guarda en $data, se crea $trabajador con datos esperados, se formatea ambas variables y luego se compara
        $response = Http::get('http://44.201.209.77/api/licenciapermiso/92547903');
        $data = json_decode($response->getBody());
        $trabajador = array(
            "empleado"=>"SI",
            "rut"=>92547903,
            "empNombreCompleto"=>"Dorian Rhodes",
            "asistenciaTipo"=>"Licencia",
            "asistenciaNombreTipo"=>"Licencia",
            "asistenciaFechaInicio"=>"2022-09-17",
            "asistenciaFechaTermino"=>"2022-09-22",
            "asistenciaDiasTomados"=>"5"
        );
        $expected_data = json_encode(array($trabajador));
        $real_data = json_encode(array($data));
        $this->assertEquals($expected_data, $real_data);
    }

    public function test_integration_trabajador()
    {
        //$this->withoutExceptionHandling();
        //se ingresa el endpoint, se obtiene el body y se guarda en $data, se crea $trabajador con datos esperados, se formatea ambas variables y luego se compara
        $response = Http::get('http://44.201.209.77/api/trabajador/92547856');
        $data = json_decode($response->getBody());
        $trabajador = array(
            "empleado"=>"SI",
            "empleadoRut"=>92547856,
            "nombreCompleto"=>"Noor Mullins",
            "TrabajoCargo"=>"Waiter",
            "TrabajoFamiliaCargo"=>"Waiter",
            "departamento"=>"Waiter",
            "centroCosto"=>"0",
            "lmyPermisos"=>"NO",
            "vac"=>"NO"
        );
        $expected_data = json_encode(array($trabajador));
        $real_data = json_encode(array($data));
        $this->assertEquals($expected_data, $real_data);
        
    }
}