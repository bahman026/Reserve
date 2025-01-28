<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;

Route::prefix('clients')
    ->as('clients.')
    ->group(function () {
        Route::get('/', [ClientController::class, 'index'])
            ->name('index');

        Route::post('/', [ClientController::class, 'store'])
            ->name('store');

        Route::get('{client:id}', [ClientController::class, 'show'])
            ->name('show');
    });
