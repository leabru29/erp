<?php

use Illuminate\Support\Facades\Route;
use Modules\Estoque\Http\Controllers\CategoriaController;
use Modules\Estoque\Http\Controllers\FornecedorController;
use Modules\Estoque\Http\Controllers\ProdutoController;
use Modules\Estoque\Http\Controllers\UnidadeMedidaController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    
});

Route::prefix('estoque')->group(function(){
    Route::apiResource('fornecedor', FornecedorController::class)->names('estoque.fornecedor');
    Route::apiResource('categorias', CategoriaController::class)->names('estoque.categorias');
    Route::apiResource('unidade-medida', UnidadeMedidaController::class)->names('estoque.unidade.medida');
    Route::apiResource('produtos', ProdutoController::class)->names('estoque.produto');
});
