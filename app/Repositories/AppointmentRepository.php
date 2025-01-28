<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function create($data)
    {
        return Appointment::query()->create($data);
    }

    public function update(array $data, $id)
    {
        $user = Appointment::query()->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete($id): ?bool
    {
        $user = Appointment::query()->findOrFail($id);

        return $user->delete();
    }

    public function all(): Collection
    {
        return Appointment::all();
    }

    public function find($id)
    {
        return Appointment::query()->findOrFail($id);
    }
}
