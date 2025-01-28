<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\AppointmentRepository;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Repositories\Interfaces\ClientRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
