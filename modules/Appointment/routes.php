<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Appointment\Http\Controllers\AppointmentController;

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
