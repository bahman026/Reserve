<?php

declare(strict_types=1);

namespace Modules\Appointment\Repositories\Interfaces;

use Core\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface AppointmentRepositoryInterface extends RepositoryInterface
{
    public function getAllAppointments(): Collection;
}
