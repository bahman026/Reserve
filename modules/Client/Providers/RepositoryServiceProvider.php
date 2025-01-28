<?php

declare(strict_types=1);

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Repositories\Interfaces\ClientRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
