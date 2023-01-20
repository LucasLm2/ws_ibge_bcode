<?php

namespace App\Repository\Contracts;

interface IIbge
{
    public function listarMunicipiosPorUf(string $uf): ?array;
}