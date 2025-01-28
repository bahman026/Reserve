<?php

declare(strict_types=1);

namespace Modules\Consultant\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Consultant\Repositories\ConsultantRepository;
use Modules\Consultant\Repositories\Interfaces\ConsultantRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ConsultantRepositoryInterface::class, ConsultantRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
