<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Consultant;
use App\Repositories\Interfaces\ConsultantRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
