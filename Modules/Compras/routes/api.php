<?php

use Illuminate\Support\Facades\Route;
use Modules\Compras\Http\Controllers\ComprasController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('compras', ComprasController::class)->names('compras');
});
