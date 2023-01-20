<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipiosPorUfRequest;
use App\Repository\Contracts\IIbge;

/**
 * @OA\Info(
 *     version="0.1",
 *     title="API IBGE BCode"
 * )
 */
class IbgeController extends Controller
{
    public function __construct(private IIbge $ibge)
    {}

    /**
     * @OA\Get(
     *      path="/api/v1/ibge/municipios/uf/{uf}",
     *      @OA\Parameter(
     *         name="uf",
     *         in="path",
     *         description="Buscar por estado",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Sucesso",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={{"name": "Abatiá","ibge_code": 4100103},{"name": "Agudos do Sul","ibge_code": 4100301},{"name": "Almirante Tamandaré","ibge_code": 4100400},}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Não Encontrado",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"message": "Não encontrado."}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="422", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"message": "O campo uf não é um UF válido.","errors": {"uf": {"O campo uf não é um UF válido."}}}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"message": "Server Error"}, summary="json")
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
