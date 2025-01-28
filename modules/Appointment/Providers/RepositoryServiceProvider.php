<?php

declare(strict_types=1);

namespace Modules\Appointment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Appointment\Repositories\AppointmentRepository;
use Modules\Appointment\Repositories\Interfaces\AppointmentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
