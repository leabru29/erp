<?php

use Illuminate\Support\Facades\Route;
use Modules\Estoque\Http\Controllers\EstoqueController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('estoques', EstoqueController::class)->names('estoque');
});
