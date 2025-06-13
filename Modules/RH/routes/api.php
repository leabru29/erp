<?php

use Illuminate\Support\Facades\Route;
use Modules\RH\Http\Controllers\AfastamentoController;
use Modules\RH\Http\Controllers\AvaliacaoDesempenhoController;
use Modules\RH\Http\Controllers\BeneficioController;
use Modules\RH\Http\Controllers\CargoController;
use Modules\RH\Http\Controllers\ColaboradorController;
use Modules\RH\Http\Controllers\DepartamentoController;
use Modules\RH\Http\Controllers\DependenteController;
use Modules\RH\Http\Controllers\DocumentoColaboradorController;
use Modules\RH\Http\Controllers\FeriasController;
use Modules\RH\Http\Controllers\HorarioTrabalhoController;
use Modules\RH\Http\Controllers\PontoRegistroController;
use Modules\RH\Http\Controllers\TreinamentoController;

Route::prefix('v1')->group(function () {
    Route::prefix('rh')->group(function(){
        Route::apiResource('colaboradores', ColaboradorController::class);
        Route::apiResource('departamentos', DepartamentoController::class);
        Route::apiResource('cargos', CargoController::class);
        Route::apiResource('ferias', FeriasController::class);
        Route::apiResource('dependentes', DependenteController::class);
        Route::apiResource('documentos-colaboradores', DocumentoColaboradorController::class);
        Route::apiResource('horario-trabalho', HorarioTrabalhoController::class)->only(['store', 'update']);
        Route::apiResource('ponto-registro', PontoRegistroController::class)->only(['store', 'update']);
        Route::apiResource('afastamentos', AfastamentoController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('avaliacao-desempenho', AvaliacaoDesempenhoController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('beneficios', BeneficioController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('treinamentos', TreinamentoController::class)->only(['store', 'update', 'destroy']);
    });
});