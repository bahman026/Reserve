<?php

declare(strict_types=1);

use Modules\Appointment\Providers\AppointmentServiceProvider;
use Modules\Client\Providers\ClientServiceProvider;
use Modules\Consultant\Providers\ConsultantServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    ConsultantServiceProvider::class,
    ClientServiceProvider::class,
    AppointmentServiceProvider::class,
];
