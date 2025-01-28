<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
