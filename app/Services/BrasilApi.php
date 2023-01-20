<?php

namespace App\Services;

use App\Services\Contracts\IPesquisaExterna;
use Illuminate\Support\Facades\Http;

class BrasilApi implements IPesquisaExterna
{
    public function consultarMunicipiosPorUf(string $uf): ?array
    {
        $consulta = json_decode(Http::get(config("app.api_brasil") . "ibge/municipios/v1/$uf"));
        
        if(isset($consulta->type) && $consulta->type == 'not_found') {
            return null;
        }
        
        return $this->formataRetorno($consulta);
    }

    public function formataRetorno($dadosMunicipios): array
    {
        $municipios = [];
        foreach ($dadosMunicipios as $municipio) {
            $municipios[] = [
                'name' => $municipio->nome,
                'ibge_code' => $municipio->codigo_ibge
            ];
        }

        return $municipios;
    }
}