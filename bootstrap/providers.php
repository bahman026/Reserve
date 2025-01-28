<?php

declare(strict_types=1);

use Modules\Client\Providers\ClientServiceProvider;
use Modules\Consultant\Providers\ConsultantServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RepositoryServiceProvider::class,
    ConsultantServiceProvider::class,
    ClientServiceProvider::class,
];
