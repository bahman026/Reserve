<?php

declare(strict_types=1);

namespace Modules\Consultant\Repositories\Interfaces;

use Core\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface ConsultantRepositoryInterface extends RepositoryInterface
{
    public function getAllWithAppointments(): Collection;
}
