<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreAppointmentAction;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Throwable;

class AppointmentController extends Controller
{
    public function __construct(readonly AppointmentRepositoryInterface $appointmentRepository) {}

    /**
     * List all appointments with clients and appointments.
     */
    public function index(): JsonResponse
    {
        $appointments = $this->appointmentRepository->getAllAppointments();

        return response()->json(AppointmentResource::collection($appointments), 200);
    }

    /**
     * Create a new appointment
     */
    public function store(AppointmentRequest $request, StoreAppointmentAction $storeAppointmentAction): JsonResponse
    {
        try {
            $appointment = $storeAppointmentAction($request);

            return response()->json([
                'message' => trans('appointment.appointment_created_successfully'),
                'appointment' => new AppointmentResource($appointment),
            ], 201);
        } catch (Throwable $throwable) {
            return response()->json([
                'message' => trans('appointment.error_creating_appointment'),
                'error' => $throwable->getMessage(),
            ], 500);
        }
    }

    /**
     * Show a specific appointment
     */
    public function show(Appointment $appointment): JsonResponse
    {
        $appointment->load('consultant', 'client');

        return response()->json(new AppointmentResource($appointment), 200);
    }
}
