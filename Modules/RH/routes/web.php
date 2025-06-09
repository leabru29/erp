<?php

use Illuminate\Support\Facades\Route;
use Modules\RH\Http\Controllers\RHController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('rhs', RHController::class)->names('rh');
});
