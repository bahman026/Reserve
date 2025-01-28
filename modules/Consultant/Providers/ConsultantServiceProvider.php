<?php

declare(strict_types=1);

namespace Modules\Consultant\Providers;

use Illuminate\Support\ServiceProvider;

class ConsultantServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'consultant');

    }
}
