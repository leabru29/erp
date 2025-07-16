<?php

use Illuminate\Support\Facades\Route;
use Modules\Usuarios\Http\Controllers\UsuariosController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'viewIndex'])->name('usuarios.view.index');
});