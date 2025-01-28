<?php

declare(strict_types=1);

namespace Modules\Appointment\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Appointment\Models\Appointment;
use Modules\Appointment\Repositories\Interfaces\AppointmentRepositoryInterface;

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

    public function getAllAppointments(): Collection
    {
        return Appointment::with('consultant', 'client')->get();
    }
}
