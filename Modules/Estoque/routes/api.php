<?php

use Illuminate\Support\Facades\Route;
use Modules\Estoque\Http\Controllers\CategoriaController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    
});

Route::prefix('estoque')->group(function(){
        Route::apiResource('categorias', CategoriaController::class)->names('estoque.categorias');
    });
