<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface extends RepositoryInterface
{
    public function getAllWithAppointments(): Collection;
}
