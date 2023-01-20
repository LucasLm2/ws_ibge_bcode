<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="0.1",
 *     title="API IBGE BCode"
 * )
 * @OA\PathItem(path="/api/ibge")
 */
class IbgeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/ibge/municipios",
     *      @OA\Response(
     *          response="200", 
     *          description="Sucesso",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      ),
     *      @OA\Response(
     *          response="412 e 500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
    public function listarMunicipios()
    {

    }

    /**
     * @OA\Get(
     *      path="/api/ibge/municipios/{ibge}",
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
     *          response="412 e 500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
    public function buscarMunicipio(int $codIbge)
    {
        
    }

    /**
     * @OA\Get(
     *      path="/api/ibge/municipios/uf/{uf}",
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
     *          response="412 e 500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
    public function listarMunicipiosPorUf(string $uf)
    {

    }

    /**
     * @OA\Get(
     *      path="/api/ibge/uf",
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
     *          response="412 e 500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
    public function listasUfs()
    {

    }

    /**
     * @OA\Get(
     *      path="/api/ibge/uf/{code}",
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
     *          response="412 e 500", 
     *          description="Erro",
     *          @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="json")
     *          )
     *      )
     * )
     */
    public function buscarUf(string|int $codigo)
    {

    }
}
