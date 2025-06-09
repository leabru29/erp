<?php

use Illuminate\Support\Facades\Route;
use Modules\Producao\Http\Controllers\ProducaoController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('producaos', ProducaoController::class)->names('producao');
});
