<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreClientAction;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\JsonResponse;
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
                'message' => trans('client.client_created_successfully'),
                'client' => new ClientResource($client),
            ], 201);
        } catch (Throwable $throwable) {
            return response()->json([
                'message' => trans('client.error_creating_client'),
                'error' => $throwable->getMessage(),
            ], 500);
        }
    }
}
