<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function __construct(readonly ClientRepositoryInterface $clientRepository) {}

    /**
     * List all clients with their appointments.
     */
    public function index(): JsonResponse
    {
        $consultants = $this->clientRepository->getAllWithAppointments();

        return response()->json(ClientResource::collection($consultants), 200);
    }
}
