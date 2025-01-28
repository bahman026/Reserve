<?php

declare(strict_types=1);

namespace Modules\Consultant\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Consultant\Models\Consultant;
use Modules\Consultant\Repositories\Interfaces\ConsultantRepositoryInterface;

class ConsultantRepository implements ConsultantRepositoryInterface
{
    public function create($data)
    {
        return Consultant::query()->create($data);
    }

    public function update(array $data, $id)
    {
        $user = Consultant::query()->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete($id): ?bool
    {
        $user = Consultant::query()->findOrFail($id);

        return $user->delete();
    }

    public function all(): Collection
    {
        return Consultant::all();
    }

    public function find($id)
    {
        return Consultant::query()->findOrFail($id);
    }

    public function getAllWithAppointments(): Collection
    {
        return Consultant::with('appointments.client')->get();
    }
}
