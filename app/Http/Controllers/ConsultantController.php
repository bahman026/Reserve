<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreConsultantAction;
use App\Http\Requests\ConsultantRequest;
use App\Http\Resources\ConsultantResource;
use App\Models\Consultant;
use App\Repositories\Interfaces\ConsultantRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Throwable;

class ConsultantController extends Controller
{
    public function __construct(readonly ConsultantRepositoryInterface $consultantRepository) {}

    /**
     * List all consultants
     */
    public function index(): JsonResponse
    {
        $consultants = $this->consultantRepository->getAllWithAppointments();

        return response()->json(ConsultantResource::collection($consultants), 200);
    }

    /**
     * Create a new consultant
     */
    public function store(ConsultantRequest $request, StoreConsultantAction $storeConsultantAction): JsonResponse
    {
        try {
            $consultant = $storeConsultantAction($request);

            return response()->json([
                'message' => trans('consultant.consultant_created_successfully'),
                'consultant' => new ConsultantResource($consultant),
            ], 201);
        } catch (Throwable $throwable) {
            return response()->json([
                'message' => trans('consultant.error_creating_consultant'),
                'error' => $throwable->getMessage(),
            ], 500);
        }
    }

    /**
     * Show a specific consultant (with appointments)
     */
    public function show(Consultant $consultant): JsonResponse
    {
        $consultant->load('appointments.client');

        return response()->json(new ConsultantResource($consultant), 200);
    }
}
