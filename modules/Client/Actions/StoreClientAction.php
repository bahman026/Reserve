<?php

declare(strict_types=1);

namespace Modules\Client\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Client\DTOs\ClientDTO;
use Modules\Client\Http\Requests\ClientRequest;
use Modules\Client\Repositories\Interfaces\ClientRepositoryInterface;
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
