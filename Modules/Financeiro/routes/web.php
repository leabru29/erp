<?php

use Illuminate\Support\Facades\Route;
use Modules\Financeiro\Http\Controllers\FinanceiroController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('financeiros', FinanceiroController::class)->names('financeiro');
});
