<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Consultant\Http\Controllers\ConsultantController;

Route::prefix('consultants')
    ->as('consultant.')
    ->group(function () {
        Route::get('/', [ConsultantController::class, 'index'])
            ->name('index');

        Route::post('/', [ConsultantController::class, 'store'])
            ->name('store');

        Route::get('{consultant:id}', [ConsultantController::class, 'show'])
            ->name('show');
    });
