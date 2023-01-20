<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipiosPorUfRequest;
use App\Repository\Contracts\IIbge;


class IbgeController extends Controller
{
    public function __construct(private IIbge $ibge)
    {}

    
    public function listarMunicipiosPorUf(MunicipiosPorUfRequest $request)
    {
        $resultadoConsulta = $this->ibge->listarMunicipiosPorUf($request->uf);

        if($resultadoConsulta === null) {
            return response()->json($this->formataMensagemErro(), 404);
        }

        return response()->json($resultadoConsulta, 200);
    }

    private function formataMensagemErro(): array
    {
        return [
            'message' => 'Não encontrado.'                
        ];
    }
}
