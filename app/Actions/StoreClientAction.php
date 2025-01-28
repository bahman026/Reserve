<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\ClientDTO;
use App\Http\Requests\ClientRequest;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class StoreClientAction
{
    public function __construct(public ClientRepositoryInterface $clientRepository) {}

    /**
     * @throws Throwable
     */
    public function __invoke(ClientRequest $request)
    {
        try {
            DB::beginTransaction();
            $clientDto = ClientDTO::fromArray($request->validated());
            $client = $this->clientRepository->create($clientDto->toArray());
            DB::commit();

            return $client;
        } catch (Throwable $throwable) {
            DB::rollBack();

            throw $throwable;
        }
    }
}
