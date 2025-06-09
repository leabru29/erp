<?php

use Illuminate\Support\Facades\Route;
use Modules\RH\Http\Controllers\RHController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('rhs', RHController::class)->names('rh');
});
