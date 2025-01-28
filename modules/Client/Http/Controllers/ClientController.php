<?php

declare(strict_types=1);

namespace Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Client\Actions\StoreClientAction;
use Modules\Client\Http\Requests\ClientRequest;
use Modules\Client\Http\Resources\ClientResource;
use Modules\Client\Models\Client;
use Modules\Client\Repositories\Interfaces\ClientRepositoryInterface;
use Throwable;

class ClientController extends Controller
{
    public function __construct(readonly ClientRepositoryInterface $clientRepository) {}

    /**
     * List all clients with their appointments.
     */
    public function index(): JsonResponse
    {
        $clients = $this->clientRepository->getAllWithAppointments();

        return response()->json(ClientResource::collection($clients), 200);
    }

    /**
     * Create a new client.
     */
    public function store(ClientRequest $request, StoreClientAction $storeClientAction): JsonResponse
    {
        try {
            $client = $storeClientAction($request);

            return response()->json([
                'message' => trans('client::client.client_created_successfully'),
                'client' => new ClientResource($client),
            ], 201);
        } catch (Throwable $throwable) {
            return response()->json([
                'message' => trans('client::client.error_creating_client'),
                'error' => $throwable->getMessage(),
            ], 500);
        }
    }

    /**
     * Show a specific client (with appointments)
     */
    public function show(Client $client): JsonResponse
    {
        $client->load('appointments.consultant');

        return response()->json(new ClientResource($client), 200);
    }
}
