<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipiosPorUfRequest;
use App\Repository\Contracts\IIbge;

/**
 * @OA\Info(
 *     version="0.1",
 *     title="API IBGE BCode"
 * )
 * @OA\PathItem(path="/api/ibge")
 */
class IbgeController extends Controller
{
    public function __construct(private IIbge $ibge)
    {}

    /**
     * @OA\Get(
     *      path="api/v1/ibge/municipios/uf/{uf}",
     *      @OA\Response(
     *          response="200", 
     *          description="Sucesso",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Não Encontrado",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="422", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
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
