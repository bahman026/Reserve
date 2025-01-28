<?php

declare(strict_types=1);

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('appointments')
    ->as('appointments.')
    ->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])
            ->name('index');

        Route::post('/', [AppointmentController::class, 'store'])
            ->name('store');

        Route::get('{appointment:id}', [AppointmentController::class, 'show'])
            ->name('show');
    });
