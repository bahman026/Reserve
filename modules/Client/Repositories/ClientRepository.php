<?php

declare(strict_types=1);

namespace Modules\Client\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Client\Models\Client;
use Modules\Client\Repositories\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    public function create($data)
    {
        return Client::query()->create($data);
    }

    public function update(array $data, $id)
    {
        $user = Client::query()->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete($id): ?bool
    {
        $user = Client::query()->findOrFail($id);

        return $user->delete();
    }

    public function all(): Collection
    {
        return Client::all();
    }

    public function find($id)
    {
        return Client::query()->findOrFail($id);
    }

    public function getAllWithAppointments(): Collection
    {
        return Client::with('appointments.consultant')->get();
    }
}
