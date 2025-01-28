<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface AppointmentRepositoryInterface extends RepositoryInterface
{
    public function getAllAppointments(): Collection;
}
