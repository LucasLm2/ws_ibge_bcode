<?php

namespace App\Repository;

use App\Repository\Contracts\IIbge;
use App\Services\Contracts\IPesquisaExterna;
use Illuminate\Support\Facades\Cache;

class Ibge implements IIbge
{
    public function __construct(private IPesquisaExterna $pesquisaExterna) {}

    public function listarMunicipiosPorUf(string $uf): ?array
    {

        $dadosCache = $this->verificaCache('municipios-' . $uf);
        if($dadosCache !== null) {
            return $dadosCache;
        }
        
        return $this->buscarEmApiExterna($uf);
    }

    private function verificaCache(string $uf): ?array
    {
        if(Cache::has($uf)) {
            return Cache::get($uf);
        }

        return null;
    }

    private function buscarEmApiExterna(string $uf): ?array
    {
        $dadosMunicipios = $this->pesquisaExterna->consultarMunicipiosPorUf($uf);
        if($dadosMunicipios !== null) {
            $this->salvaNoCache($dadosMunicipios, $uf);
        }

        return $dadosMunicipios;        
    }

    private function salvaNoCache(array $dadosMunicipios, string $uf): void
    {
        Cache::put('municipios-' . $uf, $dadosMunicipios);
    }
}