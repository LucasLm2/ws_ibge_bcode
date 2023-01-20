<?php

namespace App\Services\Contracts;

interface IPesquisaExterna 
{
    public function consultarMunicipiosPorUf(string $uf): ?array;
    public function formataRetorno($dadosMunicipios): array;
}