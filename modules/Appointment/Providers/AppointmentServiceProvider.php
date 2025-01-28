<?php

declare(strict_types=1);

namespace Modules\Appointment\Providers;

use Illuminate\Support\ServiceProvider;

class AppointmentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'appointment');

    }
}
