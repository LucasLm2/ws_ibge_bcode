<?php

namespace App\Services;

use App\Services\Contracts\IPesquisaExterna;
use Illuminate\Support\Facades\Http;

class IbgeApi implements IPesquisaExterna
{
    public function consultarMunicipiosPorUf(string $uf): ?array
    {
        $consulta = json_decode(Http::get(config("app.api_ibge") . "v1/localidades/estados/$uf/municipios"));

        if(count($consulta) === 0) {
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
                'ibge_code' => $municipio->id
            ];
        }

        return $municipios;
    }
}