<?php

declare(strict_types=1);

namespace Modules\Client\Repositories\Interfaces;

use Core\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface extends RepositoryInterface
{
    public function getAllWithAppointments(): Collection;
}
