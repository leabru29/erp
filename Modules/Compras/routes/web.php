<?php

use Illuminate\Support\Facades\Route;
use Modules\Compras\Http\Controllers\ComprasController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('compras', ComprasController::class)->names('compras');
});
