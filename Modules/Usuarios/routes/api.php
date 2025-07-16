<?php

use Illuminate\Support\Facades\Route;
use Modules\Usuarios\Http\Controllers\UsuariosController;

Route::prefix('v1')->group(function () {
    Route::apiResource('usuarios', UsuariosController::class)->names('usuarios');
});