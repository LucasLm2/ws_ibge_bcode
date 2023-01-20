<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbgeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {
    Route::prefix('ibge')->group(function () {
        Route::prefix('municipios')->group(function () {
            Route::get('/uf/{uf}', [IbgeController::class, 'listarMunicipiosPorUf']);
        });
    });
});