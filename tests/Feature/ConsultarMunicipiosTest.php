<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsultaMunicipiosTest extends TestCase
{
    public function test_pesquisando_municipio_por_uf_valida()
    {
        $response = $this->get('/api/v1/ibge/municipios/uf/PR');

        $response->assertJsonStructure([
            [
                "name",
                "ibge_code"
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_pesquisando_municipio_por_uf_invalida()
    {
        $response = $this->get('/api/v1/ibge/municipios/uf/ABC');
        
        $response->assertJsonStructure([
            "message",
            "errors" => [
                "uf" => [],
            ]
        ]);
        $response->assertStatus(422);
    }

    public function test_tentando_pesquisar_municipio_sem_incluir_uf()
    {
        $response = $this->get('/api/v1/ibge/municipios/uf/');
        
        $response->assertJsonStructure([
            "message"
        ]);
        $response->assertStatus(404);
    }
}